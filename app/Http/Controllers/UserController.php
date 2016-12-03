<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Transaction;
use Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    public function getSignup(){

    	return view('user.signup');
    }

    public function postSignup(Request $request){

    	$this->validate($request ,[	
            'name' => 'required',
    		'email' => 'email | required | unique:users',
    		'password' => 'required | min:4'
    		]);

    	$user = new User([
    		'name' => $request['name'],
    		'email' => $request['email'],
    		'password' => bcrypt($request['password'])]);
    	$user->save();
        Auth::login($user);

    	return redirect()->route('product.index');


    }

    public function getProfile(){

    	return view('user.profile');

    }

    public function getSignin(){

        return view('user.signin');
    }

    public function postSignin(Request $request){

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
            ]);
        if(Auth::attempt(['email'=>$request['email'] , 'password' => $request['password']]))
        {
            return redirect()->route('product.index');
        }
        return redirect()->back();
    }

    public function getOrders(){

        $user_transaction = \Auth::user()->transaction;
        $user_transaction->transform(function($user_transaction,$key){
            $user_transaction->cart = unserialize($user_transaction->cart);
            return $user_transaction;
        });
        return view('user.orders')->with('orders',$user_transaction);

    }

    public function logout()
    {
    	Auth::logout();
        return redirect()->route('product.index'); 
    }
}
