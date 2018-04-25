<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class ManageOrderController extends Controller
{
    public function manage_order(){
    	$order_details = DB::table('tbl_order')
    					->join('tbl_customer', 'tbl_customer.customer_id','=','tbl_order.customer_id')
    					->select('tbl_order.*','tbl_customer.customer_name','tbl_customer.customer_id')
    					->get();
    	return view('admin.manage_order')->with('order_details',$order_details);
    }

    public function view_order($order_id){
    	$orders = DB::table('tbl_order_details')
    						->join('tbl_order','tbl_order_details.order_id','=','tbl_order.order_id')
    						->where('tbl_order_details.order_id',$order_id)
    						->select('tbl_order_details.*')
    						->get();
    	
    	$shipping_info = DB::table('tbl_order')
    							->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
    							->select('tbl_shipping.*','tbl_order.order_total')
    							->where('tbl_order.order_id',$order_id)
    							->first();
    	$customer_id = Session::get('customer_id');
    	$customer_info = DB::table('tbl_customer')->where('customer_id',$customer_id)->first();

    	// $order_details = DB::table('tbl_order_details')->where()
    	return view('admin.view_order')->with('orders',$orders)
    								   ->with('customer_info',$customer_info)
    								   ->with('shipping_info',$shipping_info);
    }
}
