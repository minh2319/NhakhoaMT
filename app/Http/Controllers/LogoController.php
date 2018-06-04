<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\logo;
class LogoController extends Controller
{
    //
	public function showlist(){
		$logo=logo::all();
		return view("admin.logo",compact('logo'));
	}
	public function xoa($id){
		$logo=logo::find($id);
		$logo->delete();
		return redirect()->back()->with('status', 'xóa thành công!');
	}
	public function them(Request $request){
		$logo=new logo;
//Upload hinh
		$name='file';
		if($request->hasFile($name)){
			$messages = [
				'image' => 'Định dạng không cho phép',
				'max' => 'Kích thước file quá lớn',
			];
        // Điều kiện cho phép upload
			$this->validate($request, [
				'file' => 'image|max:2028',
			], $messages);
        // Kiểm tra file hợp lệ
			if ($request->file($name)->isValid()){
            // Lấy tên file
				$file_name = $request->file($name)->getClientOriginalName();
				$hinh = str_random(4)."_".$file_name;
            // Lưu file vào thư mục upload với tên là biến $filename
				$request->file($name)->move('upload',$hinh);
				$logo->HinhAnh=$hinh;
			}
		}
		//Upload hinh	
			$logo->save();
		return redirect()->back()->with('status', 'Thêm thành công!');
	}
	public function suatinhtrang($id){
		$logo=logo::find($id);
		if($logo->TinhTrang==0)
		{
			$logo['TinhTrang']=1;
		}else{
			$logo['TinhTrang']=0;
		}
		$logo->save();

		return redirect()->back()->with('status', 'Sửa thành công!');
	}
	

}
