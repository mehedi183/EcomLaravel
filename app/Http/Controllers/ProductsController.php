<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use UploadedFile;
use Session;
use DB;

class ProductsController extends Controller
{
    public function index(){
    	$products = DB::table('tbl_products')
                        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                        ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                        ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                        ->get();
                        //dd($products);
    	return view('admin.products')->with('products',$products);
    }

    public function add_products(){
    	$categories = DB::table('tbl_category')->get();
    	$brands = DB::table('tbl_manufacture')->get();
    	return view('admin.add_products')
    				->with('categories',$categories)
    				->with('brands',$brands);
    }

    public function store_products(Request $request){
    	$product = array();
    	// dd($request->all());
    	$product['product_name'] = $request->product_name;
    	$product['category_id'] = $request->category_id;
    	$product['manufacture_id'] = $request->manufacture_id;
    	$product['product_short_description'] = $request->product_short_description;
    	$product['product_long_description'] = $request->product_long_description;
    	$product['product_price'] = $request->product_price;
    	$product['product_size'] = $request->product_size;
    	$product['product_color'] = $request->product_color;
    	
    	$product['publication_status'] = 0;
    	if ($request->publication_status == 'on') {
    		$product['publication_status'] = 1;
    	}

    	$image = $request->file('product_image');
    	if ($image) {
    		$image_name = str_random(30);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_full_name = $image_name.'.'.$ext;
    		$upload_path = 'images/';
    		$upload_url = $upload_path.$image_full_name;
    		$success = $image->move($upload_path,$image_full_name);
    		if ($success) {
    			$product['product_image']=$upload_url;
    			Db::table('tbl_products')->insert($product);
    			Session::put('message','product added successfully');
    			return redirect()->back();
    		}

    	}
    	$product['product_image'] = '';
    	Db::table('tbl_products')->insert($product);
    	Session::put('message','product added successfully without image');
    	return redirect()->back();
    	
    }
    public function change_product_publication_status($product_id){
        $product = DB::table('tbl_products')->where('product_id',$product_id)->first();
        if ($product->publication_status == 1) {
            $publication_status =0;
        }
        else{
            $publication_status =1;
        }
        DB::table('tbl_products')->where('product_id',$product_id)->update(['publication_status'=>$publication_status]);
        return redirect()->back();
    }

    public function edit_product($product_id){
        $product = DB::table('tbl_products')->where('product_id',$product_id)->first();
        $categories = DB::table('tbl_category')->get();
        $brands = DB::table('tbl_manufacture')->get();
        return view('admin/edit_product')->with('product',$product)
                                        ->with('categories',$categories)
                                        ->with('brands',$brands);
    }


    public function delete_product($product_id){
        DB::table('tbl_products')->where('product_id',$product_id)
                                ->delete();
        Session::put('message','product deleted successfully..!');
        return redirect()->back();
    }

    public function update_product(Request $request,$product_id){
        $stored_product = DB::table('tbl_products')->where('product_id',$request->product_id)->first();
        $product = array();
        // dd($request->all());
        $product['product_name'] = $request->product_name;
        $product['category_id'] = $request->category_id;
        $product['manufacture_id'] = $request->manufacture_id;
        $product['product_short_description'] = $request->product_short_description;
        $product['product_long_description'] = $request->product_long_description;
        $product['product_price'] = $request->product_price;
        $product['product_size'] = $request->product_size;
        $product['product_color'] = $request->product_color;
        
        $product['publication_status'] = 0;
        if ($request->publication_status == 'on') {
            $product['publication_status'] = 1;
        }

        $image = $request->file('product_image');
        if ($image) {
            $image_name = str_random(30);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'images/';
            $upload_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if ($success) {
                $product['product_image']=$upload_url;
                Db::table('tbl_products')->where('product_id',$product_id)->update($product);
                Session::put('message','product updated successfully');
                return redirect()->route('all_products');
            }

        }
        elseif($stored_product->product_image){
            $product['product_image']= $stored_product->product_image;
            Db::table('tbl_products')->where('product_id',$product_id)->update($product);
            Session::put('message','product updated successfully');
            return redirect()->route('all_products');
        }
        $product['product_image'] = '';
        Db::table('tbl_products')->insert($product);
        Session::put('message','product updated successfully without image');
        return redirect()->route('all_products');
        
    }
}



// public function show_product_by_category($category_id){
//         $products_by_category = DB::table('tbl_products')->where('category_id',$category_id)
//                                             ->where('publication_status',1)
//                                             ->limit(18)
//                                             ->get();

//         $sliders = DB::table('tbl_slider')->where('publication_status',1)->get();

//         return view('pages/products_by_category')->with('products_by_category',$products_by_category)
//                                                 ->with('sliders',$sliders);
//     }