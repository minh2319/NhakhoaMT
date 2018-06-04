<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaitin;
class LoaiTinController extends Controller
{
    //
	public function showlist(){
		$loaitin=loaitin::all();
		return view("admin.loaitin",compact('loaitin'));
	}
	public function xoa($id){
		$loaitin=loaitin::find($id);
		$loaitin->delete();
		return redirect()->back()->with('status', 'xóa thành công!');
	}
		public function sua($id,Request $request){
		$loaitin=loaitin::find($id);
		$loaitin->TenLoaiTin=$request->ten;
		$loaitin->save();
		return redirect()->back()->with('status', 'Sửa thành công!');
	}
	public function them(Request $request){
		$loaitin=new loaitin;
		$loaitin->TenLoaiTin=$request->ten;
		$loaitin->save();
		return redirect()->back()->with('status', 'Thêm thành công!');
	}
	public function ajaxmodal($id){
		$loaitin=loaitin::find($id);
		?>
		<form action='sua/<?php echo $id;?>' method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="md-form mb-3">
					<b>Mã Loại Tin</b>
					<?php echo csrf_field() ?>
					<input type="text" name="ma" class="form-control" value="<?php echo $loaitin['MaLoaiTin']; ?>" readonly="true">
					<b>Tên Loại Tin</b>
					<input type="text" name="ten" class="form-control"  value="<?php echo $loaitin['TenLoaiTin']; ?>">
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
