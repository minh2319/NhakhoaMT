<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taikhoan;
class loginController extends Controller
{
    //
	public function popup(){
		return view("admin.loginpopup",compact('logo'));
	}
}
