<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DB;
use Session;

class BrandsController extends Controller
{
    public function index(){
    	$brands = DB::table('tbl_manufacture')->get();
    	return view('admin.brand')->with('brands',$brands);
    }
    public function add_brand(){
    	return view('admin.add_brand');
    }
    public function store_brand(Request $request){
    	$this->validate($request,[
    		'manufacture_name'=>'required|max:255',
    		'manufacture_description'=>'required',
    		//'publication_status'=>'required'
    	]);
    	$data = array();
    	
    	$data['manufacture_name'] = $request->manufacture_name;
    	$data['manufacture_description'] = $request->manufacture_description;
    	$data['publication_status']=$request->publication_status;
    	$data['publication_status'] = 0;
    	if ($request->publication_status == 'on') {
    		$data['publication_status'] = 1;
    	}
    
    	DB::table('tbl_manufacture')->insert($data);
    	Session::put('message','Brand added successfully');
    	return redirect()->back();
    }

    public function change_brand_publication_status($manufacture_id){
    	$brand = DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->first();
    	if ($brand->publication_status == 1) {
    		$publication_status =0;
    	}
    	else{
    		$publication_status =1;
    	}
    	DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->update(['publication_status'=>$publication_status]);
    	return redirect()->back();
    }

    public function edit_brand($manufacture_id){
    	$brand = DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->first();
    	return view('admin/edit_brand')->with('brand',$brand);
    }


    public function update_brand(Request $request,$manufacture_id){
    	$data=array();
    	$data['manufacture_name'] = $request->manufacture_name;
    	$data['manufacture_description'] = $request->manufacture_description;
    	DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)
    								->update($data);
    	Session::put('message','Brand Updated successfully.!');
    	return Redirect::to('all_brand');
    }


    public function delete_brand($manufacture_id){
    	DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)
    							->delete();
    	Session::put('message','Brand deleted successfully..!');
    	return redirect()->back();
    }
}
