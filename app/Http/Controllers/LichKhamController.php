<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lichkham;
use App\bacsi;
class LichKhamController extends Controller
{
	public function showlist(){
		$lichkham=lichkham::all();
		$bacsi=bacsi::all();
		return view("admin.lichkham",compact('lichkham','bacsi'));
	}

}
