<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\InvoiceProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{

    public function create()
    {
        return view('invoice.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = new Invoice();
        $cart = Session::get('cartSession');
        $invoice->user_id = $cart[0]['user_id'];
        $data = $request->only($invoice->getFillable());
        $invoice->fill($data);
        $invoice->total = Session::get('totalPrice');
        $invoice->save();
        $invoiceId = $invoice->id;
        $invoice->code = $this->createCodeInvoice($invoiceId);
        $invoice->save();
        $products = collect();
        for ($i=0; $i < count($cart); $i++)
        {
            $product = new InvoiceProduct();
            $product->product_id = $cart[$i]['id'];
            $product->quantity = $cart[$i]['quantity'];
            $product->price = $cart[$i]['price'];
            $product->invoice_id = $invoiceId;
            $product->name = $cart[$i]['name'];
            $product->save();
            $products->push($product);
        }
        Session::forget('cartSession');
        Session::forget('totalPrice');
        return redirect(action('InvoiceController@show',$invoiceId));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Invoice::find($id)->invoiceProducts;
        $invoice = Invoice::find($id);
        return view('invoice.index',compact('products','invoice'));
    }

    public function createCodeInvoice($id)
    {
        //DH2903180001
        $code = 'DH'.date("dmy");
        for($i = $id; $i <= 999; $i = $i*10)
        {
            $code .= '0';
        }
        $code .= $id;
        return $code;
    }
}
