<?php
/**
 * Created by: TriNQ
 * Date: 26-03-2018
 * Time: 16:39 PM
 */
?>
@extends('layouts.app')
@section('css')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
@endsection
@section('content')

    <div class="row product-detail">
        <div class="col-md-5">
            <img class="img-thumbnail" src="{{asset($product->image)}}">
        </div>
        <div class="col-md-7">
            <h5>{{$product->name}}</h5>
            <p>Giá: {{$product->price}}</p>
            <p>Tình trạng: @if($product->quantity > 0) Còn hàng @else Hết hàng @endif</p>
            <p>Số lượng: <input type="number" name="quantity" value="1"></p>
            <p><input type="button" class="btn btn-primary" id="submit" value="Thêm vào giỏ"></p>
        </div>
        <div class="col-md-12">
            {{$product->content}}
        </div>
    </div>

@endsection
@section('javascript')
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#submit").click(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:"{{action('CartController@addProduct')}}",
                data:{
                    id:'{{$product->id}}',
                    quantity:$('input[name="quantity"]').val()
                },
                success:function(data){
                    if(data.err != null){
                        toastr.error(data.err);
                    }else{
                        toastr.success('Thêm sản phẩm vào giỏ hàng thành công');
                    }

                }
            });
        });
    </script>
@endsection