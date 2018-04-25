<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index(){
    	$sliders = DB::table('tbl_slider')
    				->where('publication_status',1)->get();
    	$products = DB::table('tbl_products')->join('tbl_manufacture', 'tbl_manufacture.manufacture_id','=','tbl_products.manufacture_id')
                                             ->select('tbl_products.*','tbl_manufacture.*')
                                             ->where('tbl_products.publication_status',1)
                                             ->where('tbl_manufacture.publication_status',1)
    				                         ->limit(9)
    				                         ->get();
    	return view('pages/home_content')->with('products',$products)
                                        ->with('sliders',$sliders);
    }

    public function view_product($product_id){
        $sliders = DB::table('tbl_slider')
                    ->where('publication_status',1)->get();

        $product = DB::table('tbl_products')->join('tbl_manufacture', 'tbl_manufacture.manufacture_id','=','tbl_products.manufacture_id')
                                             ->select('tbl_products.*','tbl_manufacture.*')
                                             ->where('tbl_products.publication_status',1)
                                             ->where('tbl_manufacture.publication_status',1)
                                             ->where('product_id',$product_id)
                                             ->first();


        return view('pages.view_product')->with('sliders',$sliders)
                                         ->with('product',$product);
    }

    public function show_product_by_category($category_id){
        $products_by_category = DB::table('tbl_products')
                                            ->join('tbl_manufacture','tbl_manufacture.manufacture_id','=','tbl_products.manufacture_id')
                                            ->select('tbl_products.*','tbl_manufacture.manufacture_name')
                                            ->where('tbl_products.publication_status',1)
                                            //->where('tbl_manufacture.manufacture_id',1)
                                            ->where('tbl_products.category_id',$category_id)
                                            ->limit(18)
                                            ->get();
        // dd($products_by_category);

        $sliders = DB::table('tbl_slider')->where('publication_status',1)->get();

        return view('pages/products_by_category')->with('products_by_category',$products_by_category)
                                                ->with('sliders',$sliders);
    }
    public function show_product_by_brand($manufacture_id){
        $products_by_brand = DB::table('tbl_products')
                                            ->join('tbl_manufacture','tbl_manufacture.manufacture_id','=','tbl_products.manufacture_id')
                                            ->select('tbl_products.*','tbl_manufacture.manufacture_name')
                                            //->where('tbl_manufacture.manufacture_id',1)
                                            ->where('tbl_products.manufacture_id',$manufacture_id)
                                            ->where('tbl_products.publication_status',1)
                                            ->limit(18)
                                            ->get();
        // dd($products_by_brand);

        $sliders = DB::table('tbl_slider')->where('publication_status',1)->get();

        return view('pages/products_by_brand')->with('products_by_brand',$products_by_brand)
                                                ->with('sliders',$sliders);
    }
}
