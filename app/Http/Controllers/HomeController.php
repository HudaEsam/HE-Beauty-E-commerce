<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\HomeController
class HomeController extends Controller
{
   public function redirect(){
    if(Auth::user()->role=="admin"){
        return view("Admin.home");
    }
    else{
        return view("User.home");
    }
   }
}
