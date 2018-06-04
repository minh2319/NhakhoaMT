<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FE_TrangKhachHangController extends Controller
{
    public function getTrangKH()
    {
    	return view('page.khachhang');
    }
}
