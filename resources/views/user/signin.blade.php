@extends('layout.masters')
@section('contents')
<div class = "row">

	<div class= "col-md-4 col-md-offset-4">
		
		<h1>Sign In</h1>
		@if(count($errors)>0)
		<div class = "alert alert-danger">
			@foreach($errors->all() as $error)
			<p>{{$error}}</p>
			@endforeach
		</div>
		@endif
		
			<form action = "{{route('user.signin')}}" method = "post">

			<div class = "form-group">
			<label for = "email">Email</label>
			<input type = "email" name = "email" class = "form-control">

		</div>

			<div class = "form-group">
			<label for = "password">Password</label>
			<input type = "password" name = "password" class = "form-control">

		</div>
		<input type = "submit" class = "btn btn-primary form-control" value ="Submit"></><br>
		Don't Have an Account ? Sign up <a href = "{{route('user.signup')}}">here.</a>
		{{csrf_field()}}
		</form>


	</div>
	</div>
	@endsection