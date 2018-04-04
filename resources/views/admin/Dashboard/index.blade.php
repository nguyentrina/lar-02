<?php
/**
 * Created by: TriNQ
 * Date: 29-03-2018
 * Time: 11:04 AM
 */
?>
@extends('admin.layouts.app')
@section('main')

    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-shopping-cart fa-3x"></i>
                <div class="info">
                    <h4>Tổng đơn hàng</h4>
                    <p><b>{{$countInvoice}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-cart-plus fa-3x"></i>
                <div class="info">
                    <h4>Đơn hàng mới</h4>
                    <p><b>{{$countInvoice}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-trophy fa-3x"></i>
                <div class="info">
                    <h4>Đơn thành công</h4>
                    <p><b>{{$countFinishInvoice}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-archive fa-3x"></i>
                <div class="info">
                    <h4>Sản phẩm</h4>
                    <p><b>{{$countProduct}}</b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Monthly Sales</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Support Requests</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection
