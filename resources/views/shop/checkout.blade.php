@extends('layout.masters')
@section('title')
Check out
@endsection
@section('contents')
 <div class="row"> 
        <div class = "col sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
        	<h1>Checkout</h1>
        	<h4>Total : ${{$total }}</h4><br>
        	<form method = "post" action = "{{route('post.checkout')}}">
        		<input type = "hidden" value = "{{$total}}" name = "total">
        	<input type = "submit" class = "alert alert-success" value = "Pay now"> </a>
        	{{csrf_field()}}
        </form>


        </div>
    </div>
@endsection
