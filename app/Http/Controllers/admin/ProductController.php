<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
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
        //$this->authorize('view', Product::class);
        $pr = new Product();
        $products = $pr->CategoryJoinSubCategory();
        return view('admin.product.index', compact('products'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subCate = Category::find(1)->subCategories;
        return view('admin.product.create', compact('subCate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $request->validate([
            'name' => 'required'
        ],
            [
                'name.required' => 'Tên sản phẩm không được trống'
            ]);
        if($request->hasFile('image')) {
            echo 'exist';
            $path = $request->file('image')->store('public/upload/'.date("Y/m/d"));
            $arrPath = explode('/',$path);
            $sortPath = date("Y/m/d").'/'.last($arrPath);
            $fullPath = '/storage/upload/'.$sortPath;
            $product->image = $fullPath;
        }else{
            $product->image = '';
        }
        $data = $request->only($product->getFillable());
        $product->fill($data);
        $product->save();
        return redirect(action('admin\ProductController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $subCategories = Category::find(1)->subCategories;
        return view('admin.product.edit',compact('product','subCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $request->validate([
            'name' => 'required'
        ],
            [
                'name.required' => 'Tên sản phẩm không được trống'
            ]);
        if($request->hasFile('image')) {
            echo 'exist';
            $path = $request->file('image')->store('public/upload/'.date("Y/m/d"));
            $arrPath = explode('/',$path);
            $sortPath = date("Y/m/d").'/'.last($arrPath);
            $fullPath = '/storage/upload/'.$sortPath;
            $product->image = $fullPath;
        }
        $data = $request->only($product->getFillable());
        $product->fill($data);
        $product->save();
        return redirect(action('admin\ProductController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect(action('admin\ProductController@index'));
    }
}
