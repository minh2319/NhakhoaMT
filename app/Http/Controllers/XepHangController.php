<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\xephang;
class XepHangController extends Controller
{
    //
	public function showlist(){
		$xephang=xephang::all();
		return view("admin.xephang",compact('xephang'));
	}
	public function xoa($id){
		$xephang=xephang::find($id);
		$xephang->delete();
		return redirect()->back()->with('status', 'xóa thành công!');
	}
	public function sua($id,Request $request){
		$xephang=xephang::find($id);
		$xephang->TenXepHang=$request->ten;
		$xephang->PhanTramGiamGia=$request->ptgg;
		$xephang->save();
		return redirect()->back()->with('status', 'Sửa thành công!');
	}
	public function them(Request $request){
		$xephang=new xephang;
		$xephang->TenXepHang=$request->ten;
		$xephang->PhanTramGiamGia=$request->ptgg;
		$xephang->save();
		return redirect()->back()->with('status', 'Thêm thành công!');
	}
	public function ajaxmodal($id){
		$xephang=xephang::find($id);
		?>
		<form action='sua/<?php echo $id;?>' method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="md-form mb-3">
					<?php echo csrf_field() ?>
					<b>Mã Xếp Hạng</b>
					<input type="text" name="ma" class="form-control" value="<?php echo $xephang['MaXepHang']; ?>" readonly="true">
					<b>Tên Xếp Hạng</b>
					<input type="text" name="ten" class="form-control" value="<?php echo $xephang['TenXepHang']; ?>">
					<b>Phần Trăm Giảm Giá</b>
					<input type="text" name="ptgg" class="form-control" value="<?php echo $xephang['PhanTramGiamGia']; ?>">
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
