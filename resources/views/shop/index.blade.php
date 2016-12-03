@extends('layout.masters')
@section('title')
Laravel Shopping cart
@endsection
@section('contents')
@if(Session::has('order_message'))
<div class ="row">
    <div class = "col-md-4 col-sm-3 col-md-offset-4">
<div id = "order_message" class= "alert alert-success">{{Session::get('order_message')}}</div>
</div>
</div>
@endif
	
    <div class="row">

        @foreach($products as $product)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{$product->imagePath}}" alt="..." class="img-responsive">
                <div class="caption">
                    <h4>{{$product->title}}</h4>
                    <p class="description">{{$product->description}}</p>
                    <div class="clearfix">
                        <div class="pull-left price">{{$product->price}}</div>
                        <a href="{{route('product.addToCart' ,[$product->id])}}" class="btn btn-success pull-right" role="button">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

                

</div>

@endsection