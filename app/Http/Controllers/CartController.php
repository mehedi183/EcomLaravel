<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;

class CartController extends Controller
{
	public function index(){

	}
    public function add_to_cart(Request $request){
    	$quantity = $request->quantity;
    	$product_info = DB::table('tbl_products')->where('product_id',$request->product_id)->first();
    	
    	$data['qty'] = $request->quantity;
    	$data['id'] = $product_info->product_id;
    	$data['name'] = $product_info->product_name;
    	$data['price'] = $product_info->product_price;
    	$data['options']['image'] = $product_info->product_image;
    	Cart::add($data);

    	return redirect()->route('show_cart');
    }
    public function show_cart(){
    	return view('pages.add_to_cart');
    }

    public function remove_item_from_cart($id){
    	$cart_row_id = $id;
    	Cart::remove($cart_row_id);
    	return redirect()->back();
    }

    public function update_cart(Request $request){
    	$qty = $request->quantity;
    	$rowId = $request->rowId;

    	Cart::update($rowId,$qty);
    	return redirect()->back();
    }
}
