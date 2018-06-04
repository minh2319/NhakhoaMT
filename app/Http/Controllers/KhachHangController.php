<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khachhang;
use App\xephang;
use App\taikhoan;


class KhachHangController extends Controller
{
    //
	public function showlist(){
		$khachhang=khachhang::all();
		$taikhoan=taikhoan::all();
		$xephang=xephang::all();
		return view("admin.khachhang",compact('khachhang','xephang','taikhoan'));
	}
	public function them(Request $request){
		$khachhang=new khachhang;
		$khachhang->TenKhachHang=$request->tenkh;
		$khachhang->SDT=$request->sdt;
		$khachhang->NgaySinh=$request->ngaysinh;
		$khachhang->DiaChi=$request->diachi;
		$khachhang->MaTaiKhoan=$request->matk;
		$khachhang->CMND=$request->cmnd;
		$khachhang->Email=$request->email;
		$khachhang->MaGioiThieu=str_random(8);
		$khachhang->save();
		$taikhoan=taikhoan::find($request->matk);
		$taikhoan->TinhTrang=1;
		$taikhoan->save();
		return redirect()->back()->with('status', 'Thêm thành công!');
	}
	public function sua($id,Request $request){
		$khachhang=khachhang::find($id);
		$khachhang->TenKhachHang=$request->tenkh;
		$khachhang->SDT=$request->sdt;
		$khachhang->NgaySinh=$request->ngaysinh;
		$khachhang->DiaChi=$request->diachi;
		$khachhang->CMND=$request->cmnd;
		$khachhang->Email=$request->email;

		$khachhang->save();
		return redirect()->back()->with('status', 'Thêm thành công!');
	}
	public function ajaxmodal($id){
		$khachhang=khachhang::find($id);
		?>
		<form action='sua/<?php echo $id;?>' method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="md-form mb-3">
					<?php echo csrf_field() ?>
					<b>Tên Khách hàng</b>
					<input type="text" name="tenkh" class="form-control" value="<?php echo $khachhang['TenKhachHang'];?>">
					<b>Ngày Sinh</b>
					<input type="date" name="ngaysinh" class="form-control" value="<?php echo $khachhang['NgaySinh'];?>">
					<b>Địa chỉ</b>
					<input type="text" name="diachi" class="form-control" value="<?php echo $khachhang['DiaChi'];?>">
					<b>SDT</b>
					<input type="text" name="sdt" class="form-control" value="<?php echo $khachhang['SDT'];?>">
					<b>Email</b>
					<input type="email" name="email" class="form-control" value="<?php echo $khachhang['Email'];?>">
					<b>CMND</b>
					<input type="text" name="cmnd" class="form-control" value="<?php echo $khachhang['CMND'];?>">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
				<input type="submit" class="btn btn-primary" value="Lưu">
			</div> 
		</form>

		<?php
	}
}
