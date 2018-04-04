<?php
/**
 * Created by: TriNQ
 * Date: 28-03-2018
 * Time: 16:47 PM
 */
?>
@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Thêm thông tin giao hàng</h3>
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
                    <form method="POST" action="{{action('InvoiceController@store')}}">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Tên người nhận</label>
                            <input class="form-control" type="text" name="name" placeholder="Nhập tên người nhận">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Số điện thoại</label>
                            <input class="form-control" type="text" name="phone" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Địa chỉ nhận hàng</label>
                            <input class="form-control" type="text" name="address" placeholder="Nhập địa chỉ nhận hàng">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Ghi chú</label>
                            <textarea name="note" class="form-control"></textarea>
                        </div>
                        <input type="submit" value="Đặt hàng" class="btn-primary btn">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
