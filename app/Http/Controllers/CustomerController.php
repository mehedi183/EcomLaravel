<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Cart;
use DB;

class CustomerController extends Controller
{
    //
    public function customer_logout($customer_id){
    	if (Session::has('$customer_id')) {
    		Cart::destroy();
    		
    		
    	}
    	Session::flush();
    	return redirect()->route('home');
    }

    public function customer_login(Request $request){
    	$customer_email = $request->customer_email;
    	$password = md5($request->password);

    	$is_customer = DB::table('tbl_customer')
    					->where('customer_email',$customer_email)
    					->where('password',$password)
    					->first();
    	if($is_customer){
    		Session::put('customer_id',$is_customer->customer_id);
    		return redirect()->route('checkout');
    	}
    	else{
    		session::put('message','Wrong email or password');
    		return redirect()->back();
    	}
    }
}
