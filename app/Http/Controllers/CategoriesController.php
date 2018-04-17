<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class CategoriesController extends Controller
{
    public function index(){
    	$categories = DB::table('tbl_category')->get();
    	return view('admin.category')->with('categories', $categories);
    }
    public function add_category(){
    	return view('admin.add_category');
    }

    public function store_category(Request $request){
    	$this->validate($request,[
    		'category_name'=>'required|max:255',
    		'category_description'=>'required',
    		//'publication_status'=>'required'
    	]);
    	$data = array();
    	
    	$data['category_name'] = $request->category_name;
    	$data['category_description'] = $request->category_description;
    	$data['publication_status']=$request->publication_status;
    	$data['publication_status'] = 0;
    	if ($request->publication_status == 'on') {
    		$data['publication_status'] = 1;
    	}
		
    	DB::table('tbl_category')->insert($data);
    	Session::put('message','Category added successfully');
    	return redirect()->back();
    }

    public function change_category_publication_status($category_id){
    	$category = DB::table('tbl_category')->where('category_id',$category_id)->first();
    	if ($category->publication_status == 1) {
    		$publication_status =0;
    	}
    	else{
    		$publication_status =1;
    	}
    	DB::table('tbl_category')->where('category_id',$category_id)->update(['publication_status'=>$publication_status]);
    	return redirect()->back();
    }
}
