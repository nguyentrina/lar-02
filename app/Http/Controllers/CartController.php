<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->forgetCartSession();
        $dataCart = Session::get('cartSession');
        $dataTotal = Session::get('totalPrice');
        return view('cart.index',compact('dataCart','dataTotal'));
    }

    public function addProduct(Request $request)
    {
        try {
            $quantity = $request->get('quantity');
            $id = $request->get('id');
            $i = 0;
            $total = 0;
            $session = Session::get('cartSession');
            if (Session::exists('cartSession'))
            {
                for($j=0;$j<count($session);$j++)
                {
                    if($session[$j]['id'] == $id)
                    {
                        $session[$j]['quantity'] += $quantity;
                        $i = 1;
                    }
                    $price = str_replace(".","", $session[$j]['price']);
                    $total += $session[$j]['quantity'] * (int)$price;
                }
            }
            if($i==1)
            {
                Session::put('cartSession', $session);
            }
            else
            {
                $product = Product::find($id);
                $cart = [
                    'id' => $id,
                    'user_id' => Auth::id(),
                    'quantity' => $quantity,
                    'name' => $product->name,
                    'price' => $product->price
                ];
                Session::push('cartSession', $cart);
                $price = str_replace(".","", $product->price);
                $total += $price * $quantity;
            }
                Session::put('totalPrice',number_format($total, 0, '', '.'));
            return response()->json(['success' => 'Thêm thành công'], 200);
        }
        catch (\Exception $ex)
        {
            return response()->json(['err' => $ex->getMessage()]);
        }
    }

    public function removeProduct($id)
    {
        try
        {
            $cart = Session::get('cartSession');
            $total = (int)str_replace(".", "", Session::get('totalPrice'));
            if (Session::exists('cartSession')) {
                for ($j = 0; $j < count($cart); $j++) {
                    if ($cart[$j]['id'] == $id) {
                        $price = str_replace(".", "", $cart[$j]['price']);
                        $total -= (int)$price * (int)$cart[$j]['quantity'];
                        Session::put('totalPrice', number_format($total, 0, '', '.'));
                        unset($cart[$j]);
                    }
                }
                Session::put('cartSession', $cart);
            }
            return response()->json(['success' => 'Thêm thành công'], 200);
        }
        catch (\Exception $ex)
        {
            return response()->json(['err'=>$ex->getMessage()]);
        }
    }

    public function updateProduct($id, $quantity)
    {
        try
        {
            $cart = Session::get('cartSession');
            $total = (int)str_replace(".", "", Session::get('totalPrice'));
            $newQuantity = $quantity;
            if (Session::exists('cartSession'))
            {
                for ($j = 0; $j < count($cart); $j++) {
                    if ($cart[$j]['id'] == $id) {
                        $oldQuantity = $cart[$j]['quantity'];
                        if ($newQuantity == $oldQuantity)
                        {
                            return response()->json(['success'=>'OK'],200);
                        }
                        elseif ($newQuantity > $oldQuantity)
                        {
                            $price = str_replace(".", "", $cart[$j]['price']);
                            $total += (int)$price * ($newQuantity - $oldQuantity);
                        }
                        else
                        {
                            $price = str_replace(".", "", $cart[$j]['price']);
                            $total -= (int)$price * ($oldQuantity - $newQuantity);
                        }
                        Session::put('totalPrice', number_format($total, 0, '', '.'));
                        $cart[$j]['quantity'] = $newQuantity;
                    }
                }
                Session::put('cartSession', $cart);
            }
            return response()->json(['success'=>'OK'],200);
        }
        catch (\Exception $ex)
        {
            return response()->json(['err'=> $ex->getMessage()],200);
        }
    }

    public function forgetCartSession()
    {
        Session::forget('cartSession');
        Session::forget('totalPrice');
        return true;
    }


}
