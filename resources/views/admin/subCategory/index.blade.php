<?php
/**
 * Created by: TriNQ
 * Date: 22-03-2018
 * Time: 10:36 AM
 */
?>
@extends('admin/layouts/app')
@section('title','Danh sách thư mục')
@section('main')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Danh sách danh mục</h1>
            <p></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{action('admin\SubCategoryController@create')}}">Thêm mới</a>
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="catTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Phân loại</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $cat)
                        <tr>
                            <td>{{$cat->id}}</td>
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->category->name}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{action('admin\SubCategoryController@edit',$cat->id)}}">Sửa</a>
                                <form action="{{action('admin\SubCategoryController@destroy',$cat->id)}}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input type="submit" value="Xóa " class="btn btn-danger">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$("#catTable").DataTable();</script>
@endsection