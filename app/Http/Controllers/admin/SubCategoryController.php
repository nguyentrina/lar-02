<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use App\SubCategory;
use App\Category;

class SubCategoryController extends Controller
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
        $sc = new SubCategory();
        $data = $sc->subCategoriesJoinCategories();

        return view('admin.subCategory.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|max:255'
        ],
            [
                'name.required' => 'Tên danh mục không được trống!'
            ]);
        $sub = new SubCategory();
        $data = $request->only($sub->getFillable());
        $sub->fill($data)->save();
        return redirect(action('admin\SubCategoryController@index'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub = new SubCategory();
        $subCategory = $sub->find($id);
        $categories = Category::all();
        return view('admin.subCategory.edit',compact('subCategory','categories'));
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
        $sub = SubCategory::find($id);
        $data = $request->only($sub->getFillable());
        $sub->fill($data)->save();
        return redirect(action('admin\SubCategoryController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub = SubCategory::find($id);
        $sub->delete();
        return redirect(action('admin\SubCategoryController@index'));
    }
}
