<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\phongkham;
class PhongKhamController extends Controller
{
	public function showlist(){
		$phongkham=phongkham::all();
		return view("admin.phongkham",compact('phongkham'));
	}
	public function them(Request $request){
		$phongkham=new phongkham;
		$phongkham->TenPhongKham=$request->ten;
		$phongkham->DuongDan=$request->duongdan;
		$phongkham->DiaChi=$request->diachi;
		$phongkham->Email=$request->email;
		$phongkham->SDT=$request->sdt;
		$phongkham->save();
		return redirect()->back()->with('status', 'Thêm thành công!');
	}
		public function sua($id,Request $request){
		$phongkham=phongkham::find($id);
		$phongkham->TenPhongKham=$request->ten;
		$phongkham->DuongDan=$request->duongdan;
		$phongkham->DiaChi=$request->diachi;
		$phongkham->Email=$request->email;
		$phongkham->SDT=$request->sdt;
		$phongkham->save();
		return redirect()->back()->with('status', 'Sửa thành công!');
	}
		public function xoa($id){
		$phongkham=phongkham::find($id);
		$phongkham->delete();
		return redirect()->back()->with('status', 'xóa thành công!');
	}

	public function ajaxmodal($id){
		$phongkham=phongkham::find($id);
		?>
		<form action='sua/<?php echo $id;?>' method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="md-form mb-3">
					<?php echo csrf_field() ?>
					 <b>Tên</b>
            <input type="text" name="ten" class="form-control" value="<?php echo $phongkham['TenPhongKham']; ?>">
             <b>Đường Dẫn</b>
            <input type="text" name="duongdan" class="form-control"  value='<?php echo $phongkham['DuongDan']; ?>'>
             <b>SDT</b>
            <input type="text" name="sdt" class="form-control"  value="<?php echo $phongkham['SDT']; ?>">
             <b>Địa Chỉ</b>
            <input type="text" name="diachi" class="form-control"  value="<?php echo $phongkham['DiaChi']; ?>">
             <b>Email</b>
            <input type="email" name="email" class="form-control"  value="<?php echo $phongkham['Email']; ?>">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
				<input type="submit" class="btn btn-primary" value="Lưu">
			</div> 
		</form>
		<?php
	}
}
