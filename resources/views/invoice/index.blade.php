<?php
/**
 * Created by: TriNQ
 * Date: 28-03-2018
 * Time: 16:31 PM
 */
?>
@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12"><h3 class="text-center text-success">Thông tin đơn hàng</h3></div>
        <div class="col-md-12"><h5 class="text-center text-danger">Mã đơn hàng {{$invoice->code}}</h5></div>
        <div class="col-md-12">
            <p class="text-danger"><b>Địa chỉ giao hàng</b></p>
            <p>
                <strong>{{$invoice->name}}</strong><br>
                <strong>{{$invoice->address}}</strong><br>
                <strong>{{$invoice->phone}}</strong><br>
            </p>
        </div>
        <br><br>
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th><strong>Tên sản phẩm</strong></th>
                    <th><strong>Số lượng</strong></th>
                    <th><strong>Giá</strong></th>
                </tr>
                </thead>
                <tbody>
                @for($i=0; $i < count($products); $i++)
                <tr>
                    <td>{{$products[$i]['name']}}</td>
                    <td class="text-xs-center">{{$products[$i]['quantity']}}</td>
                    <td class="text-xs-center">{{$products[$i]['price']}}</td>
                </tr>
                @endfor
                <tr>
                    <td></td>
                    <td class="text-right text-primary"><strong>Tổng tiền</strong></td>
                    <td class="text-danger"><b>{{$invoice->total}}</b></td>
                </tr>
                </tbody>
            </table>
            <div class="note">
                <b class="text-success">Ghi chú: </b>{{$invoice->note}}
            </div>
        </div>
    </div>

@endsection
