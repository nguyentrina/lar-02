<?php
/**
 * Created by: TriNQ
 * Date: 22-03-2018
 * Time: 10:37 AM
 */
?>
@extends('admin/layouts/app')
@section('title','Sửa danh mục')
@section('main')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Thêm danh mục</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="tile-body">
                    <form method="POST" action="{{action('admin\SubCategoryController@update',$subCategory->id)}}">
                        @csrf
                        <input name="_method" value="PATCH" type="hidden" >
                        <div class="form-group">
                            <label class="control-label">Tên</label>
                            <input class="form-control" type="text" name="name" value="{{$subCategory->name}}" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Phân loại</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}" @if($cat->id == $subCategory->category_id) selected @endif >{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" value="Thêm mới" class="btn-primary btn">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection