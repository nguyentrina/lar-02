<?php
/**
 * Created by: TriNQ
 * Date: 26-03-2018
 * Time: 11:03 AM
 */
?>
@extends('admin/layouts/app')
@section('title','Thêm sản phẩm')
@section('main')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Thêm sản phẩm</h3>
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
                    <form method="POST" action="{{action('admin\ProductController@store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Tên sản phẩm</label>
                            <input class="form-control" type="text" name="name" placeholder="Nhập tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Giá sản phẩm</label>
                            <input class="form-control number" type="text" name="price" placeholder="Nhập giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Số lượng sản phẩm</label>
                            <input class="form-control number" type="text" name="quantity" placeholder="Nhập số lượng sản phẩm">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Ảnh sản phẩm</label>
                            <input class="form-control" type="file" name="image">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Danh mục</label>
                            <select name="sub_category_id" class="form-control">
                                @foreach($subCate as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Chi tiết sản phẩm</label>
                            <textarea name="content" class="form-control"></textarea>
                        </div>
                        <input type="submit" value="Thêm mới" class="btn-primary btn">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('javascript')
    <script>
        var format = function(num){
            var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
            if(str.indexOf(",") > 0) {
                parts = str.split(",");
                str = parts[0];
            }
            str = str.split("").reverse();
            for(var j = 0, len = str.length; j < len; j++) {
                if(str[j] != ".") {
                    output.push(str[j]);
                    if(i%3 == 0 && j < (len - 1)) {
                        output.push(".");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return(formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        };
        $(function(){
            $(".number").keypress(function (e) {
                //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });
            $(".number").keyup(function(e){
                $(this).val(format($(this).val()));
            });
        });
    </script>
@endsection