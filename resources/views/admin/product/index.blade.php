<?php
/**
 * Created by: TriNQ
 * Date: 26-03-2018
 * Time: 9:29 AM
 */
?>
@extends('admin\layouts/app')
@section('title','Danh sách sản phẩm')
@section('main')

    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Danh sách danh mục</h1>
            <p></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{action('admin\ProductController@create')}}">Thêm mới</a>
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="catTable">
                        <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên</th>
                            <th>Gía</th>
                            <th>Số lượng</th>
                            <th>Danh mục</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $item)
                            <tr>
                                <td class="image"><img src="{{asset($item->image)}}" class="img-thumbnail"></td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->SubCategory->name}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{action('admin\ProductController@edit',$item->id)}}">Sửa</a>
                                    <form action="{{action('admin\ProductController@destroy',$item->id)}}" method="post">
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