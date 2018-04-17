<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Session;
use DB;



use Session;
session_start();
class AdminController extends Controller
{
    public function index(){
    	return view('admin_login');
    }
    public function show_dashboard(){
    	return view('admin.dashboard');
    }
    public function dashboard(Request $request){
    	$this->validate($request,[
    		'admin_email'	=>	'required|email',
    		'admin_password'=>	'required'

    	]);

    	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);

    	//echo $admin_email;
    	//echo $admin_password;
    	$result = DB::table('tbl_admin')->where('admin_email',$admin_email)
    									->where('admin_password',$admin_password)
    									->first();
    	if ($result) {
    		Session::put('admin_name',$result->admin_name);
    		Session::put('admin_id',$result->admin_id);
    		return redirect('/dashboard');
    	}else{
    		Session::put('message','Invalid email or password');
    		return redirect()->back();
    	}
    }
}
