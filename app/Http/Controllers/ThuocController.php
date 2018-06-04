<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\thuoc;

class ThuocController extends Controller
{
	public function showlist(){
		$thuoc=thuoc::all();
		return view("admin.thuoc",compact('thuoc'));
	}
	public function xoa($id){
		$thuoc=thuoc::find($id);
		$thuoc->delete();
		return redirect()->back()->with('status', 'xóa thành công!');
	}
	public function sua($id,Request $request){
		$thuoc=thuoc::find($id);
		$thuoc->Tenthuoc=$request->ten;
		$thuoc->Gia=$request->gia;
		$thuoc->TonKho=$request->tonkho;
		$thuoc->save();
		return redirect()->back()->with('status', 'Sửa thành công!');
	}
	public function them(Request $request){
		$thuoc=new thuoc;
		$thuoc->Tenthuoc=$request->ten;
		$thuoc->Gia=$request->gia;
		$thuoc->TonKho=$request->tonkho;
		$thuoc->save();
		return redirect()->back()->with('status', 'Thêm thành công!');
	}
	public function ajaxmodal($id){
		$thuoc=thuoc::find($id);
		?>
		<form action='sua/<?php echo $id;?>' method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="md-form mb-3">
					<?php echo csrf_field() ?>
					<b>Mã Thuốc</b>
					<input type="text" name="ma" class="form-control" value="<?php echo $thuoc['MaThuoc']; ?>" readonly="true">
					<b>Tên</b>
					<input type="text" name="ten" class="form-control" value="<?php echo $thuoc['TenThuoc']; ?>">
					<b>Giá</b>
					<input type="text" name="gia" class="form-control" value="<?php echo $thuoc['Gia']; ?>"> 
					<b>Tồn Kho</b>
					<input type="text" name="tonkho" class="form-control" value="<?php echo $thuoc['TonKho']; ?>">
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
