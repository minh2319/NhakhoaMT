<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dichvu;
use App\loaidichvu;
class DichVuController extends Controller
{
	public function showlist(){
		$dichvu=dichvu::all();
		$loaidichvu=loaidichvu::all();
		return view("admin.dichvu",compact('dichvu','loaidichvu'));
	}
	public function xoa($id){
		$dichvu=dichvu::find($id);
		$dichvu->delete();
		return redirect()->back()->with('status', 'xóa thành công!');
	}
	public function them(Request $request){
		$dichvu=new dichvu;
		$dichvu->TenDichVu=$request->ten;
		$dichvu->Gia=$request->gia;
		$dichvu->GioiThieu=$request->gioithieu;
		$dichvu->MaLoaiDichVu=$request->maloaidichvu;
		$dichvu->save();
		return redirect()->back()->with('status', 'Thêm thành công!');
	}
		public function sua($id,Request $request){
		$dichvu=dichvu::find($id);
		$dichvu->TenDichVu=$request->ten;
		$dichvu->Gia=$request->gia;
		$dichvu->GioiThieu=$request->gioithieu;
		$dichvu->MaLoaiDichVu=$request->maloaidichvu;
		$dichvu->save();
		return redirect()->back()->with('status', 'Sửa thành công!');
	}
	public function ajaxmodal($id){
		$dichvu=dichvu::find($id);
		$loaidichvu=loaidichvu::all();
		?>
		<form action='sua/<?php echo $id;?>/<?php echo '1';?>' method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="md-form mb-3">
					<?php echo csrf_field() ?>
					<b>Tên Dịch Vụ</b>
					<input type="text" name="ten" class="form-control" value="<?php echo $dichvu['TenDichVu']; ?>">
					<b>Giá</b>
					<input type="text" name="gia" class="form-control" value="<?php echo $dichvu['Gia']; ?>">
					<b>Loại Dịch Vụ</b>
					<select name="maloaidichvu" class="custom-select" >
						<?php foreach($loaidichvu as $row) {?>
							<option value="<?php echo $row['MaLoaiDichVu']; ?>"
								<?php if($row['MaLoaiDichVu']==$dichvu['MaLoaiDichVu']) 
								{ echo "selected"; } ?>
							 > <?php echo $row['TenLoaiDichVu']; ?>
						</option>
					<?php } ?>
				</select>
				<b>Giới thiệu</b>
				<textarea name="gioithieu" id="editor2"><?php echo $dichvu['GioiThieu']; ?>"</textarea>
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
