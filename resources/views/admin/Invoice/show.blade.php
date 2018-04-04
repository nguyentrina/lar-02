<?php
/**
 * Created by: TriNQ
 * Date: 29-03-2018
 * Time: 10:06 AM
 */
?>
@extends('admin.layouts.app')
@section('title','Chi tiết đơn hàng')
@section('main')

    <div class="app-title">
        <div>
            <h1><i class="fa fa-file-text-o"></i> Invoice</h1>
            <p></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <section class="invoice">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h2 class="page-header"><i class="fa fa-globe"></i> Đơn hàng</h2>
                        </div>
                        <div class="col-6">
                            <h5 class="text-right">Ngày tạo: {{$invoice->created_at->format('d-m-Y')}}</h5>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-4">To
                            <address><strong>{{$invoice->name}}</strong><br>{{$invoice->address}}<br>Phone: {{$invoice->phone}}</address>
                        </div>
                        <div class="col-4">
                        </div>
                        <div class="col-4"><b>Đơn hàng</b><br><b>Order ID:</b> {{$invoice->code}}<br><b>Tình trạng:</b> {{$invoice->statusInvoice}}</div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $item)
                                    <tr>
                                        <td></td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->price}}</td>
                                    </tr>
                                @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Tổng: </td>
                                        <td class="text-danger"><b>{{$invoice->total}}</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row d-print-none mt-2">
                        <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> In</a></div>
                    </div>
                    <div class="row d-print-none mt-2">
                        <div class="col-12 text-right"><a class="btn btn-success text-white" href="{{action('admin\InvoiceController@edit',$invoice->id)}}" ><i class="fa fa-edit"></i> Sửa</a></div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection

