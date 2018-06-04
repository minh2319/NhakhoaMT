<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;

class SlideController extends Controller
{
 //
	public function showlist(){
		$slide=slide::all();
		return view("admin.slide",compact('slide'));
	}
	public function them(Request $request){
		$slide=new slide;
		$slide->Ten=$request->ten;
		$slide->NoiDung=$request->noidung;
		$slide->Link=$request->link;
		//Upload hinh
		$name='hinh';
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
				$request->file($name)->move('source/assets/dest/images/slide/',$hinh);
				$slide->Hinh=$hinh;
			}
		}
		//Upload hinh
		$slide->save();
		return redirect()->back()->with('status', 'Thêm thành công!');
	}
	public function xoa($id){
		$slide=slide::find($id);
		$slide->delete();
		return redirect()->back()->with('status', 'xóa thành công!');
	}
			public function sua($id,Request $request){
		$slide=slide::find($id);
		$slide->Ten=$request->ten;
		$slide->NoiDung=$request->noidung;
		$slide->Link=$request->link;
		$slide->TrangThai=$request->tinhtrang;
		//Upload hinh
		$name='hinh';
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
				$request->file($name)->move('source/assets/dest/images/slide/',$hinh);
				$slide->Hinh=$hinh;
			}
		}
		//Upload hinh
		$slide->save();
		return redirect()->back()->with('status', 'Sửa thành công!');
	}
	public function ajaxmodal($id){
		$slide=slide::find($id);
		?>
		<form action='sua/<?php echo $id;?>' method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="md-form mb-3">
					<?php echo csrf_field() ?>
					<b>Tên</b>
					<input type="text" name="ten" class="form-control" value="<?php echo $slide['Ten']; ?>">
					<b>Hình ảnh</b><br>
					<img style="width: 210px;height: 150px;"  id="hinhhienthi" src=<?php echo asset('source/assets/dest/images/slide/'.$slide['Hinh']) ?> >
					<div class="custom-file" style="margin-bottom: 13px;">
						<input type="file" class="custom-file-input" name ="hinh" id="customFile" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0]);loadFile(event);">
						<label class="custom-file-label" for="customFile">Choose file</label>
					</div>  
					<b>Nội Dung</b>
					<textarea name="noidung" class="form-control" > <?php echo $slide['NoiDung']; ?></textarea>
					<b>Link</b>
					<input type="text" name="link" class="form-control" value="<?php echo $slide['Link']; ?>">
					<td>Tình trạng:</td><br><td><input type="radio" name="tinhtrang" <?php 
					if($slide['TrangThai']==1)
					{
						?>
						checked="checked";
						<?php
					}
					?> value="1"  >Hiển Thị 
					<input type="radio" name="tinhtrang" <?php 
					if($slide['TrangThai']==0)
					{
						?>
						checked="checked";
						<?php
					}
					?> value="0" >Ẩn</td>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
				<input type="submit" class="btn btn-primary" value="Lưu">
			</div> 
		</form>
		<script>  
				var loadFile = function(event) {
					var output = document.getElementById('hinhhienthi');
					output.src = URL.createObjectURL(event.target.files[0]);
				};
			</script>
		<?php
	}
}
