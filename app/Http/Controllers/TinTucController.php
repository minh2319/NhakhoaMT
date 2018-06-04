<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tintuc;
use App\loaitin;
class TinTucController extends Controller
{
	public function showlist(){
		$tintuc=tintuc::all();
		$loaitin=loaitin::all();
		return view("admin.tintuc",compact('tintuc','loaitin'));
	}
	public function xoa($id){
		$tintuc=tintuc::find($id);
		$tintuc->delete();
		return redirect()->back()->with('status', 'xóa thành công!');
	}
	public function sua($id,Request $request){
		$tintuc=tintuc::find($id);
		$tintuc->TenTinTuc=$request->ten;
		$tintuc->TieuDeKhongDau=$request->tieude;
		$tintuc->NoiDung=$request->noidung;
		$tintuc->TomTat=$request->tomtat;
		$tintuc->MaLoaiTin=$request->maloaitin;
		$tintuc->TrangThai=$request->tinhtrang;

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
				$tintuc->HinhAnh=$hinh;
			}
		}
		$tintuc->save();
		return redirect()->back()->with('status', 'Thêm thành công!');
	}
	public function them(Request $request){
		$tintuc=new tintuc;
		$tintuc->TenTinTuc=$request->ten;
		$tintuc->TieuDeKhongDau=$request->tieude;
		$tintuc->NoiDung=$request->noidung;
		$tintuc->TomTat=$request->tomtat;
		$tintuc->MaLoaiTin=$request->loaitin;

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
				$tintuc->HinhAnh=$hinh;
			}
		}
		$tintuc->save();
		return redirect()->back()->with('status', 'Thêm thành công!');
	}
	public function ajaxmodal($id){
		$tintuc=tintuc::find($id);
		$loaitin=loaitin::all();
		?>
		<form action='sua/<?php echo $id;?>' method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="md-form mb-3">
					<?php echo csrf_field() ?>
					<b>Tên tin tức</b>
					<input type="text" name="ten" class="form-control" value="<?php echo $tintuc['TenTinTuc']; ?>">
					<b>Tiêu đề không dấu</b>
					<input type="text" name="tieude" class="form-control" value="<?php echo $tintuc['TieuDeKhongDau']; ?>">
					<b>Hình ảnh</b><br>
					<img style="width: 210px;height: 150px;"  id="hinhhienthi" src=<?php echo asset('upload/'.$tintuc['HinhAnh']) ?> >
					<div class="custom-file" style="margin-bottom: 13px;">
						<input type="file" class="custom-file-input" name ="file" id="customFile" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0]);loadFile(event);">
						<label class="custom-file-label" for="customFile">Choose file</label>
					</div>  
					<b>Nội Dung</b>
					<textarea name="noidung" class="form-control" id="editor2"><?php echo $tintuc['NoiDung']; ?></textarea>
					<b>Tóm Tắt</b>
					<textarea name="tomtat" class="form-control" ><?php echo $tintuc['TomTat']; ?></textarea>
					<b>Loại Tin</b>
					<select name="maloaitin" class="form-control">
						<?php foreach($loaitin as $row) { ?>
							<option value="<?php echo $row['MaLoaiTin'];?>" 
								<?php if($row['MaLoaiTin']==$tintuc['MaLoaiTin']) 
								{ echo "selected"; } ?>
								> <?php echo $row['TenLoaiTin'];?>
							</option>
						<?php } ?>
					</select>
					<td>Tình trạng:</td><br><td><input type="radio" name="tinhtrang" <?php 
					if($tintuc['TrangThai']==1)
					{
						echo "checked";
					}
					?> value="1"  >Hiển Thị 
					<input type="radio" name="tinhtrang" <?php 
					if($tintuc['TrangThai']==0)
					{
						echo "checked";
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
		<script>CKEDITOR.replace('editor2'); </script>

		<?php
	}
}
