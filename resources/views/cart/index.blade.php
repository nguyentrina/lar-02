<?php
/**
 * Created by: TriNQ
 * Date: 27-03-2018
 * Time: 13:48 PM
 */
?>
@extends('layouts.app')
@section('content')

    <div class="row">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá</th>
                <th scope="col">#</th>
            </tr>
            </thead>
            <tbody>
            @if($dataCart != null)
                <?php $i = 1; ?>
            @foreach($dataCart as $item)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$item['name']}}</td>
                    <td><input type="number" value="{{$item['quantity']}}" id="quantity-{{$item['id']}}"/></td>
                    <td>{{$item['price']}}</td>
                    <th scope="row"><i class="fa fa-trash trash" id="trash-{{$item['id']}}"></i></th>
                </tr>
                <?php $i++; ?>
            @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-right text-primary"><b>Tổng tiền:</b></td>
                    <td class="text-danger"><b>{{$dataTotal}}</b></td>
                    <td></td>
                </tr>
                @endif
            </tbody>
        </table>
        @if($dataCart != null)
        <div class="col-md-12 text-center">
            <a href="{{action('InvoiceController@create')}}" class="btn btn-primary">Tiến hành đặt hàng</a>
        </div>
        @endif
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
        $(".trash").click(function(e){
            e.preventDefault();
            var id = e.target.id.replace('trash-','');
            $.ajax({
                type:'GET',
                url:'cart/'+id,
                success:function(data)
                {
                    if(data.err != null)
                    {
                        toastr.error(data.err);
                    }
                    else
                    {
                        location.reload();
                    }

                }
            });
        });

        $(function(){
            $('input[type="number"]').keydown(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8  && e.which != 0  && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });
            $('input[type="number"]').keyup(function(e){
                var newQuantity = $(this).val();
                var id = e.target.id.replace('quantity-','');
                changeCart(id,newQuantity);
            });
            $('input[type="number"]').change(function (e) {
                var newQuantity = $(this).val();
                var id = e.target.id.replace('quantity-','');
                changeCart(id,newQuantity);
            });
        });

        function changeCart(id,newQuantity) {
            if(newQuantity.trim(' ') == '' || newQuantity.trim(' ') == null)
            {
                return false;
            }
            if(newQuantity.trim(' ') == '0'){
                newQuantity = '';
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'GET',
                url:'cart/'+id+'/'+newQuantity,
                success:function(data)
                {
                    if(data.err != null)
                    {
                        toastr.error(data.err);
                    }
                    else
                    {
                        location.reload();
                    }
                }
            });
        }
    </script>
@endsection