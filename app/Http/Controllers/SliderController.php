<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use UploadedFile;
use Session;
use DB;

class SliderController extends Controller
{
    public function index(){
    	$sliders = DB::table('tbl_slider')->get();
    	return view('admin.slider')->with('sliders',$sliders);
    }
    public function add_slider(){
    	return view('admin.add_slider');
    }
    public function store_slider(Request $request){
    	$slider = array();
    	// dd($request->all());
    	$slider['publication_status'] = 0;
    	if ($request->publication_status == 'on') {
    		$slider['publication_status'] = 1;
    	}
    	$image = $request->file('slider_image');
    	if ($image) {
    		$slider_name = str_random(30);
    		$ext = strtolower($image->getClientOriginalExtension());
    		$slider_fullname = $slider_name.".".$ext;
    		$path = 'slider_image/';
    		$upload_url = $path.$slider_fullname;
    		$success =$image->move($path,$slider_fullname);
    		if ($success) {
    			$slider['slider_image'] = $upload_url;
    			Db::table('tbl_slider')->insert($slider);
    			Session::put('message','Slider Image added successfully');
    			return redirect()->back();
    		}
    	}
    	else{
    		$slider['slider_image'] = '';
    		Db::table('tbl_slider')->insert($slider);
    		Session::put('message','Slider Image added successfully');
    		return redirect()->back();
    	}
    	
    }
    public function change_slider_publication_status($slider_id){
        $slider = DB::table('tbl_slider')->where('slider_id',$slider_id)->first();
        if ($slider->publication_status == 1) {
            $publication_status =0;
        }
        else{
            $publication_status =1;
        }
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['publication_status'=>$publication_status]);
        return redirect()->back();
    }

    public function delete_slider($slider_id){
        DB::table('tbl_slider')->where('slider_id',$slider_id)
                                ->delete();
        Session::put('message','slider deleted successfully..!');
        return redirect()->back();
    }
}
