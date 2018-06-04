<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taikhoan;
class TaiKhoanController extends Controller
{
    //PHP

	public function showlist(){
		$taikhoan=taikhoan::all();
		return view("admin.taikhoan",compact('taikhoan'));
	}
	public function suatinhtrang($id){
		$taikhoan=taikhoan::find($id);
		if($taikhoan->TinhTrang==0)
		{
			$taikhoan['TinhTrang']=1;
		}else{
			$taikhoan['TinhTrang']=0;
		}
		$taikhoan->save();
		return redirect()->back()->with('status', 'Sửa thành công!');
	}
}