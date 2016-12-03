<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\product;
use App\Cart;
use Session;
use Softon\Indipay\Facades\Indipay; 
use App\Transaction;
use App\User;

class ProductController extends Controller
{
    public function getIndex()
    {

    	$get_products = new Product();
    	$products = $get_products::all();
    	
    	return view('shop.index')->with('products',$products);

    }

    public function getAddToCart(Request $request , $id){

    	$product = Product::find($id);
    	$oldcart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldcart);
    	$cart->add($product , $product->id);
    	$request->session()->put('cart',$cart);
    	return redirect()->route('product.index');

    }

    public function getCart(){

        if (!Session::has('cart')) {
            return view('shop.shopping-cart',['products' => 'null']);
    }

    $oldcart = Session::get('cart');
    $cart = new Cart($oldcart);
    return view('shop.shopping-cart' , ['products' => $cart->items , 'totalPrice' => $cart->totalPrice]);
         }



    public function getCheckout(){

        if(!Session::has('cart')){

            return view('shop.shopping-cart');
        }

        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        $total = $cart->totalPrice;
        return view('shop.checkout',['cart'=>$cart,'total'=>$total]);
    }
    public function postCheckout(Request $request){

        $this->validate($request,[
            'total' => 'required']);

        $total = $request['total'];

          
        
        $merchantTxnId = uniqid();   
        $orderAmount = $total;
        $currency = "INR";
        
        
        $parameters = [

            
            

            'firstname' => 'Naveen',
            'email' => 'naveenphp95@gmail.com',
            'phone' => '7845787900',
            'productinfo' => 'Demo Product',
            'amount' => $orderAmount,

         ];

        $order = Indipay::gateway('PayUMoney')->prepare($parameters);
        return Indipay::process($order);

        
        

    }

    public function paymentresponse(Request $request){

       $response = Indipay::gateway('PayUMoney')->response($request);
        
       $trans_status = $response['status'];
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
       if($trans_status === "success"){

            $transaction = new Transaction();
            $transaction->status = $response['status'];
            $transaction->mode = $response['mode'];
            $transaction->txnid = $response['txnid'];
            $transaction->amount = $response['amount'];
            $transaction->payuMoneyId = $response['payuMoneyId'];
            $transaction->cart = serialize($cart);



            //dd($transcation_details);
            if(\Auth::user()->transaction()->save($transaction)){

                Session::forget('cart');
               
                return redirect()->route('product.index')->with('order_message','Your Order Has been Successfully placed !');
            }

            


            
            
       }
       else if ($trans_status === "failure") {
           echo "Transaction failure";
       }
       
    }

    public function print_envi(){

         echo env('DB_DATABASE')."<br>";
         $vanity =  env('INDIPAY_CITRUS_VANITY_URL', 'https://sandbox.citruspay.com/e6ojft1vuh');
         $secret = env('INDIPAY_WORKING_KEY', 'b5a61cf7a75cda5d07ad6378bae77d5138a48109');
         echo $vanity."<br>";
         echo $secret."<br>";
         $id = uniqid();
         echo $id;

    }


}
