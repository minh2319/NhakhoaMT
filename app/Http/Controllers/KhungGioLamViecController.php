<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khunggiolamviec;
use Carbon\Carbon;
class KhungGioLamViecController extends Controller
{
	public function showlist(){
		$khunggiolamviec=khunggiolamviec::all();
		return view("admin.khunggiolamviec",compact('khunggiolamviec'));
	}
	public function them(Request $request){
		$khunggiolamviec=new khunggiolamviec;

		$timebd = Carbon::parse($request->bd)->format('Y-m-d H:i:s');
		$timekt = Carbon::parse($request->kt)->format('Y-m-d H:i:s');

		$khunggiolamviec->MaLich=1;
		$khunggiolamviec->ThoiGianBD=$timebd;
		$khunggiolamviec->ThoiGianKT=$timekt;
		$khunggiolamviec->Ngay=$request->ngay;

		$khunggiolamviec->save();
		echo $request->ngay.$request->bd.$request->kt;
	}
}
