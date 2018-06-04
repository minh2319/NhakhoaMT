<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bacsi;
use App\taikhoan;

class BacSiController extends Controller
{

	public function showlist(){
		$bacsi=bacsi::all();
		$taikhoan=taikhoan::all();
		return view("admin.bacsi",compact('bacsi','taikhoan'));
	}
	public function xoa($id){
		$bacsi=bacsi::find($id);
		$bacsi->delete();
		return redirect()->back()->with('status', 'xóa thành công!');
	}
	public function sua($id,Request $request){
		$bacsi=bacsi::find($id);
		$bacsi->TenBacSi=$request->ten;
		$bacsi->SDT=$request->sdt;
		$bacsi->NamSinh=$request->namsinh;
		$bacsi->GioiThieu=$request->txtContent;
		$bacsi->MaTaiKhoan=$request->matk;
		$bacsi->CMND=$request->cmnd;
		$bacsi->DiaChi=$request->diachi;
		$bacsi->BangCap=$request->bangcap;
//Upload hinh
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
				$request->file($name)->move('source/assets/dest/images/doctor/',$hinh);
				$bacsi->HinhAnh=$hinh;
			}
		}
		//Upload hinh
		$bacsi->save();
		return redirect()->back()->with('status', 'Thêm thành công!');
	}
	public function them(Request $request){
		$bacsi=new bacsi;
		$bacsi->TenBacSi=$request->ten;
		$bacsi->SDT=$request->sdt;
		$bacsi->NamSinh=$request->namsinh;
		$bacsi->GioiThieu=$request->txtContent;
		$bacsi->MaTaiKhoan=$request->matk;
		$bacsi->CMND=$request->cmnd;
		$bacsi->DiaChi=$request->diachi;
		$bacsi->BangCap=$request->bangcap;

		$taikhoan=taikhoan::find($request->matk);
		$taikhoan->TinhTrang=1;
		$taikhoan->save();
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
				$request->file($name)->move('source/assets/dest/images/doctor/',$hinh);
				$bacsi->HinhAnh=$hinh;

			}
		}
		$bacsi->save();
		return redirect()->back()->with('status', 'Thêm thành công!');
	}
	public function ajaxmodal($id){
		$bacsi=bacsi::find($id);
		$taikhoan=taikhoan::all();
		?>
		<form action='sua/<?php echo $id;?>' method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="md-form mb-3">
					<?php echo csrf_field() ?>
					<b>Tên Bác sĩ</b>
					<input type="text" name="ten" class="form-control" value="<?php echo $bacsi['TenBacSi']; ?>">
					<b>SDT</b>
					<input type="text" name="sdt" class="form-control" value="<?php echo $bacsi['SDT']; ?>">
					<b>Năm sinh</b>
					<input type="date" name="namsinh" class="form-control" value="<?php echo $bacsi['NamSinh']; ?>">
					<b>Hình ảnh</b><br>
					<img style="width: 210px;height: 150px;"  id="hinhhienthi" src=<?php echo asset('source/assets/dest/images/doctor/'.$bacsi['HinhAnh']) ?> >
					<div class="custom-file" style="margin-bottom: 13px;">
						<input type="file" class="custom-file-input" name ="file" id="customFile" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0]);loadFile(event);">
						<label class="custom-file-label" for="customFile">Choose file</label>
					</div>  
					<b>Giới thiệu</b>
					<textarea name="txtContent" class="form-control" id="editor2" ><?php echo $bacsi['GioiThieu']; ?></textarea>
					<b>Mã tài khoản</b>
					<select name="matk" class="form-control" >
						<?php foreach ($taikhoan as $tk) {
							if($tk['TinhTrang']=='3')
								{?>
									<option value="<?php echo $tk['MaTaiKhoan']; ?>"> <?php echo $tk["ID"] ?>
								</option>
								<?php
							}
							if($tk['MaTaiKhoan']==$bacsi['MaTaiKhoan'])
								{?>
									<option value="<?php echo $tk['MaTaiKhoan']; ?>" selected="selected"> <?php echo $tk["ID"] ?> 
									</option><?php
								}
							}?>
						</select>
						<b>CMND</b>
						<input type="text" name="cmnd" class="form-control" value="<?php echo $bacsi['CMND'];?>" >
						<b>Bằng cấp</b>
						<input type="text" name="bangcap" class="form-control" value="<?php echo $bacsi['BangCap'];?>" >
						<b>Địa chỉ</b>
						<input type="text" name="diachi" class="form-control" value="<?php echo $bacsi['DiaChi'];?>" >
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
