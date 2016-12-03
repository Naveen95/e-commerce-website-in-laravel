@extends('layout.masters')
@section('title')
Your orders
@endsection
@section('contents')
  <div class="panel-group">
  	@foreach($orders as $order)
    <div class="panel panel-success">
      <div class="panel-heading ">Your orders
      	<div class ="pull-right">Transaction Id : {{$order->txnid}}</div>
      	<div class ="" style ="display:inline-block;">&nbsp &nbsp<b>Order Total : {{$order->amount}}</b> <b>Order Date : {{$order->created_at->format('Y-m-d')}}</b></div>


      </div>
      <div class="panel-body">
      	
      	@foreach($order->cart->items as $item)

      	<div class = "panel-group">

      		<img class = "img-thumbnail"style = "max-width = 150px; max-height:200px; position :relative;"src ="{{$item['item']['imagePath']}}" >
      	
      	
      	Name :{{$item['item']['title']}}
      	Price : {{$item['price']}}<hr>

      	</div>
     


      	@endforeach()

      </div>
    </div><br>
    @endforeach
    </div>
@endsection


