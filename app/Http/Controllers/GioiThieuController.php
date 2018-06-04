<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gioithieu;
class GioiThieuController extends Controller
{
    public function showlist(){
		$gioithieu=gioithieu::all();
		return view("admin.gioithieu",compact('gioithieu'));
	}
	public function xoa($id){
		$gioithieu=gioithieu::find($id);
		$gioithieu->delete();
		return redirect()->back()->with('status', 'xóa thành công!');
	}
	public function sua($id,Request $request){
		$gioithieu=gioithieu::find($id);
		$gioithieu->Ten=$request->ten;
		$gioithieu->TomTat=$request->tomtat;
		$gioithieu->NoiDung=$request->noidung;
		$gioithieu->save();
		return redirect()->back()->with('status', 'Sửa thành công!');
	}
		public function them(Request $request){
		$gioithieu=new gioithieu;
		$gioithieu->Ten=$request->ten;
		$gioithieu->TomTat=$request->tomtat;
		$gioithieu->NoiDung=$request->noidung;
		$gioithieu->save();
		return redirect()->back()->with('status', 'Thêm thành công!');
	}
	public function ajaxmodal($id){
		$gioithieu=gioithieu::find($id);
		?>
		<form action='sua/<?php echo $id;?>' method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="md-form mb-3">
					<?php echo csrf_field() ?>
					<b>Tên</b>
            <input type="text" name="ten" class="form-control" value="<?php echo $gioithieu['Ten']; ?>">
            <b>Tóm Tắt</b>
            <textarea name="tomtat" class="form-control" > <?php echo $gioithieu['TomTat']; ?></textarea>
            <b>Nội Dung</b>
            <textarea name="noidung" class="form-control" id="editor2"> <?php echo $gioithieu['NoiDung']; ?> </textarea>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
			<input type="submit" class="btn btn-primary" value="Lưu">
		</div> 
	</form>
	<script> CKEDITOR.replace('editor2');</script>
	<?php
	}
}
