<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
session_start();
class SuperAdminController extends Controller
{

	// public function show_dashboard(){
	// 	$this->AuthAdmin();
 //    	return view('admin.dashboard');
 //    }
    public function logout(){
    	Session::flush();
    	return redirect('/admin');
    }
    
}
