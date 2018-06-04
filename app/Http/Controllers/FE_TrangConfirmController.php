<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FE_TrangConfirmController extends Controller
{
	public function getTrangConfirmKH(Request $req)
	{
		$name=$req->input('name');
		$sdt=$req->input('phone');
		$email=$req->input('email');
		$datetime=$req->input('datetime');
		$doctor=$req->input('doctor');
		$message=$req->input('message');

		 return view('page.xacnhanlichhen')->with(['success'=>'Đặt lịch thành công','name'=>$name,'phone'=>$sdt,'email'=>$email,'datetime'=>$datetime,'doctor'=>$doctor,'message'=>$message]);
	}
}
