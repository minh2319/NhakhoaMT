<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lichlamviec;
use App\bacsi;

class LichLamViecController extends Controller
{
	public function showlist(){
		$lichlamviec=lichlamviec::all();
		$bacsi=bacsi::all();
		return view("admin.lichlamviec",compact('lichlamviec','bacsi'));
	}
}
