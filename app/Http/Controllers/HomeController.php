<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //
    public function dashboard(){
        return view ('dashboard');
    }
    public function home(){
        $customer = session("customer");
        
        return view('home', compact('customer'));
    }
 
}
