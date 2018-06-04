<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chitietdichvu;
use App\dichvu;

class ChiTietDichVuController extends Controller
{
	public function showlist(){
		$chitietdichvu=chitietdichvu::all();
		$dichvu=dichvu::all();
		return view("admin.chitietdichvu",compact('chitietdichvu','dichvu'));
	}
}
