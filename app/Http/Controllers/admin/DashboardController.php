<?php

namespace App\Http\Controllers\admin;

use App\Invoice;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countProduct = Product::count();
        $countInvoice = Invoice::count();
        $countNewInvoice = Invoice::where('status',0)->count();
        $countFinishInvoice = Invoice::where('status',4)->count();
        return view('admin.Dashboard.index',compact(
            'countFinishInvoice',
            'countInvoice',
            'countNewInvoice',
            'countProduct'
        ));
    }
}
