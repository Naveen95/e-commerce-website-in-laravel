<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
	'uses' => 'ProductController@getIndex',
	'as' => 'product.index']);

Route::get('/add-to-cart/{id}',[
	'uses' => 'ProductController@getAddToCart',
	'as' => 'product.addToCart'
	]);

Route::get('/profile',[
	'uses' => 'UserController@getProfile',
	'as' => 'user.profile',
	'middleware'=> 'auth']);






route::group(['prefix' => 'user'] , function(){

	route::group(['middleware' => 'guest'],function(){

Route::get('/signup' ,[
	'uses' => 'UserController@getSignup',
	'as' => 'user.signup'
	]);



Route::post('/signup' ,[
	'uses' => 'UserController@postSignup',
	'as' => 'user.signup'
	]);

Route::get('/signin' ,[
	'uses' => 'UserController@getSignin',
	'as' => 'user.signin'
	]);

Route::post('/signin' ,[
	'uses' => 'UserController@postSignin',
	'as' => 'user.signin'
	]);


	});


route::group(['middleware' => 'auth'],function(){



Route::get('/shopping-cart',[
	'uses' => 'ProductController@getCart',
	'as' => 'product.shoppingCart',
	
	]);

Route::get('/orders' ,[
	'uses' => 'UserController@getOrders',
	'as' => 'user.orders'
	]);

Route::post('/paymentresponse',[
	'uses' => 'ProductController@paymentresponse',
	'as' => 'payment.response']);


Route::get('/profile',[
	'uses' => 'UserController@getProfile',
	'as' => 'user.profile']);

Route::get('/logout',[
	'uses' => 'UserController@logout',
	'as' => 'user.logout']);

Route::get('/checkout',[
	'uses' => 'ProductController@getCheckout',
	'as' => 'checkout'
	]);

Route::get('/print','ProductController@print_envi');

Route::post('/checkout',[
	'uses' => 'ProductController@postCheckout',
	'as' => 'post.checkout']);


});

});

