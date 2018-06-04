<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taikhoan;
use App\binhluan;
use App\dichvu;
use App\tintuc;


class BinhLuanController extends Controller
{
    //
	public function showlist(){
		$dichvu=dichvu::all();
		$tintuc=tintuc::all();
		$binhluan=binhluan::all();
		$taikhoan=taikhoan::all();
		return view("admin.binhluan",compact('tintuc','taikhoan','binhluan','dichvu'));
	}
	public function suatinhtrang($id){
		$binhluan=binhluan::find($id);
		if($binhluan->TinhTrang==0)
		{
			$binhluan['TinhTrang']=1;
		}else{
			$binhluan['TinhTrang']=0;
		}
		$binhluan->save();
		return redirect()->back()->with('status', 'Sửa thành công!');
	}
}
