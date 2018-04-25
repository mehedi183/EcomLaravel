<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Cart;
use DB;
class CheckOutController extends Controller
{
    public function login_check()
    {
    	return view('pages.login');
    }
    public function customer_registration(Request $request){
    	$customer = array();

    	$data['customer_name'] = $request->name;
    	$data['customer_email'] = $request->email;
    	$data['password'] = md5($request->password);
    	$data['mobile_number'] = $request->mobile_number;

    	$customer_id = DB::table('tbl_customer')->insertGetId($data);

    	Session::put('customer_name',$request->name);
    	Session::put('customer_id',$customer_id);
    	// dd($customer_id);
    	return redirect()->to('checkout');
    }

    public function checkout(){
    	if (Session::has('customer_id')) {
    		# code...
    		return view('pages.checkout');
    	}
    	else{
    		return redirect()->back();
    	}
    }

    public function save_shipping_details(Request $request){
    	$shipping_details = array();
    	$shipping_details['shipping_fname'] = $request->shipping_fname;
    	$shipping_details['shipping_lname'] = $request->shipping_lname;
    	$shipping_details['shipping_email'] = $request->shipping_email;
    	$shipping_details['shipping_mobile_number'] = $request->shipping_mobile_number;
    	$shipping_details['shipping_address'] = $request->shipping_address;
    	$shipping_details['shipping_city'] = $request->shipping_city;

    	$shipping_id = DB::table('tbl_shipping')->insertGetId($shipping_details);
    	Session::put('shipping_id',$shipping_id);
    	return redirect()->to('payment');

    }

    public function payment(){
    	if (Session::has('shipping_id')) {
    		return view('pages/payment');
    	}
    	else{
    		return redirect()->to('checkout');
    	}
    }

    public function place_order(Request $request){
    	$payment_method = $request->payment_getway;
    	$payment_data = array();
    	$payment_data['method'] = $payment_method;
    	$payment_data['payment_status'] = "pending";

    	$payment_id = DB::table('tbl_payment')->insertGetId($payment_data);
    	$shipping_id = Session::get('shipping_id');
    	$customer_id = Session::get('customer_id');
    	$order_total = Session::get('total');
////////////////////////////////////////////////////////////////////
    	$order_data = array();
    	$order_data['customer_id'] = $customer_id;
    	$order_data['shipping_id'] = $shipping_id;
    	$order_data['payment_id'] = $payment_id;
    	$order_data['order_total'] = Cart::total();
    	$order_data['order_status'] = "Pending";


    	$order_id = DB::table('tbl_order')->insertGetId($order_data);
/////////////////////////////////////////////////////////////////////
    	$contents = Cart::content();
    	$order_details_data = array();
    	foreach ($contents as $content) {
    		$order_details_data['order_id'] = $order_id;
    		$order_details_data['product_id'] = $content->id;
    		$order_details_data['product_name'] = $content->name;
    		$order_details_data['product_price'] = $content->price;
    		$order_details_data['product_quantity'] = $content->qty;

    		DB::table('tbl_order_details')->insert($order_details_data);
    	}

    	//Cart::destroy();
    	// if ($payment_method == "bkash") {
    	// 	echo "Successfully Done shopping by B-Kash";
    	// }
    	// elseif ($payment_method == "card") {
    	// 	echo "Successfully Done shopping by Card";
    	// }else{
    	// 	echo "Successfully Done shopping by Cash on delivery";
    	// }

    	//Session::put('shipping_id',"");
    	return view('pages.confirm_message');

    	// echo $shipping_id."<br>";
    	// echo $customer_id."<br>";
    	// echo $payment_method;
    }
}


