<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Http\Facades\Redirect;
session_start();

class SuperAdminConroller extends Controller
{
    

    public function index()
    {	$this->AuthCheckfun();
    	return view('admin.dashbord');
    }

   
    public function logout()
    {
    	//Session::put('admin_name',NULL);
    	//Session::put('admin_id',NULL);
    	Session::flush();
    	return Redirect('/admin');
    }
     public function AuthCheckfun()
    {
    	$result=Session::get('admin_id');
    	if($result){
    		return;
    	}
    	else{
    		return Redirect('/admin')->send();
    	}
    }
    	
}
