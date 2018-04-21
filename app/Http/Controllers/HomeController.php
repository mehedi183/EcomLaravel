<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index(){
    	$products = DB::table('tbl_products')
    				->where('publication_status',1)
    				->limit(9)
    				->get();
    	return view('pages/home_content')->with('products',$products);
    }
}
