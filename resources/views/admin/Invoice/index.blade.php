<?php
/**
 * Created by: TriNQ
 * Date: 29-03-2018
 * Time: 8:24 AM
 */
?>
@extends('admin.layouts.app')
@section('title','Danh sách đơn hàng')
@section('main')


    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Danh sách đơn hàng</h1>
            <p></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{action('admin\InvoiceController@create')}}">Thêm mới</a>
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="catTable">
                        <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tình trạng</th>
                            <th>Tổng tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $item)
                            <tr>
                                <td><a href="{{action('admin\InvoiceController@show',$item->id)}}">{{$item->code}}</a></td>
                                <td>{{$item->statusInvoice}}</td>
                                <td>{{$item->total}}</td>

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