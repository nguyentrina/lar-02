@extends('layouts.app')

@section('content')
    <!-- Jumbotron Header -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('images/bnOi.jpg')}}" alt="First slide">
            </div>
        </div>
    </div>

    <!-- Page Features -->
    <div class="row text-center">
        @foreach($products as $product)
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="{{asset($product->image)}}" alt="">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{action('ProductController@show',$product->id)}}">{{$product->name}}</a> </h5>
                </div>
                <div class="card-footer">
                    <p>{{$product->price}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /.row -->
@endsection
@section('javascript')
    <script>
        $('.carousel').carousel()
    </script>
@endsection
