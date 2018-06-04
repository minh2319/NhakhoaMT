<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loaidichvu;
class LoaiDichVuController extends Controller
{
    //
	public function showlist(){
		$loaidichvu=loaidichvu::all();
		return view("admin.loaidichvu",compact('loaidichvu'));
	}
	public function xoa($id){
		$loaidichvu=loaidichvu::find($id);
		$loaidichvu->delete();
		return redirect()->back()->with('status', 'xóa thành công!');
	}
		public function sua($id,Request $request){
		$loaidichvu=loaidichvu::find($id);
		$loaidichvu->TenLoaiDichVu=$request->ten;
		$loaidichvu->save();
		return redirect()->back()->with('status', 'Sửa thành công!');
	}
	public function them(Request $request){
		$loaidichvu=new loaidichvu;
		$loaidichvu->TenLoaiDichVu=$request->ten;
		$loaidichvu->save();
		return redirect()->back()->with('status', 'Thêm thành công!');
	}
	public function ajaxmodal($id){
		$loaidichvu=loaidichvu::find($id);
		?>
		<form action='sua/<?php echo $id;?>' method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="md-form mb-3">
					<b>Mã Loại dịch vụ</b>
					<?php echo csrf_field() ?>
					<input type="text" name="ma" class="form-control" value="<?php echo $loaidichvu['MaLoaiDichVu']; ?>" readonly="true">
					<b>Tên Loại dịch vụ</b>
					<input type="text" name="ten" class="form-control"  value="<?php echo $loaidichvu['TenLoaiDichVu']; ?>">
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
