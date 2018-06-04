<?php
namespace App\Http\Controllers;
use Session;
use Hash;
use Auth;
use App\User;
use App\khunggiolamviec;
use App\slide;

use Illuminate\http\Requeest;
class BE_DangkylichController extends Controller
{
	public function Dangkylich()
	{
	
		return view('admin.dangkylich');
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