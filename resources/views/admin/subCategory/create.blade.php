<?php
/**
 * Created by: TriNQ
 * Date: 22-03-2018
 * Time: 10:37 AM
 */
?>
@extends('admin/layouts/app')
@section('title','Thêm danh mục')
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
                    <form method="POST" action="{{action('admin\SubCategoryController@store')}}">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Tên</label>
                            <input class="form-control" type="text" name="name" placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Phân loại</label>
                            <select name="category_id" class="form-control">
                                <option value="1">Sản phẩm</option>
                                <option value="2">Tin tức</option>
                            </select>
                        </div>
                        <input type="submit" value="Thêm mới" class="btn-primary btn">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
