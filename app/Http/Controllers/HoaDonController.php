<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hoadon;
use App\bacsi;
use App\khachhang;

class HoaDonController extends Controller
{
	public function showlist(){
		$bacsi=bacsi::all()->sortBy('TenBacSi');;;
		$hoadon=hoadon::all();
		$khachhang=khachhang::all()->sortBy('TenKhachHang');
		return view("admin.hoadon",compact('hoadon','bacsi','khachhang'));
	}
	public function sua($id,Request $request){
		$hoadon=hoadon::find($id);
		$hoadon->MaBacSi=$request->mabs;
		$hoadon->SoTien=$request->sotien;
		$hoadon->GhiChu=$request->ghichu;
		$hoadon->PhuongPhapDT=$request->ppdt;
		$hoadon->KetQuaDT=$request->kqdt;
		$hoadon->MaKhachHang=$request->makh;
		$hoadon->MaGioiThieu=$request->magioithieu;
		$hoadon->PhanTramGiamGia=$request->ptgg;
		$hoadon->save();
		return redirect()->back()->with('status', 'Thêm thành công!');
	}
	public function them(Request $request){
		$hoadon=new hoadon;
		$hoadon->MaBacSi=$request->mabs;
		$hoadon->SoTien=$request->sotien;
		$hoadon->GhiChu=$request->ghichu;
		$hoadon->PhuongPhapDT=$request->ppdt;
		$hoadon->KetQuaDT=$request->kqdt;
		$hoadon->MaKhachHang=$request->makh;
		$hoadon->MaGioiThieu=$request->magioithieu;
		$hoadon->PhanTramGiamGia=$request->ptgg;
		$hoadon->save();
		return redirect()->back()->with('status', 'Thêm thành công!');
	}
	public function xoa($id){
		$hoadon=hoadon::find($id);
		$hoadon->delete();
		return redirect()->back()->with('status', 'xóa thành công!');
	}

	public function ajaxmodal($id){
		$hoadon=hoadon::find($id);
		$bacsi=bacsi::all()->sortBy('TenBacSi');;;
		$khachhang=khachhang::all()->sortBy('TenKhachHang');
		?>
		<form action='sua/<?php echo $id;?>' method="post" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="md-form mb-3">
					<?php echo csrf_field() ?>
					<b>Tên Bác sĩ</b>
					<select name="mabs" class="form-control" >
						<?php foreach($bacsi as $row) { ?>
							<option value="<?php echo $row['MaBacSi'];?>"
								<?php if($row['MaBacSi']==$hoadon['MaBacSi'])
								{ 
									echo "selected='selected'";
								} 
								?> > 
								<?php echo $row['TenBacSi'];?>
							</option>
						<?php } ?>
					</select>            
					<b>Số tiền</b>
					<input type="text" name="sotien" class="form-control" value="<?php echo $hoadon['SoTien'];?>">
					<b>Ghi chú</b>
					<input type="text" name="ghichu" class="form-control" value="<?php echo $hoadon['GhiChu'];?>">
					<b>Phương pháp DT</b>
					<input type="text" name="ppdt" class="form-control" value="<?php echo $hoadon['PhuongPhapDT'];?>">
					<b>Kết quả DT</b>
					<input type="text" name="kqdt" class="form-control" value="<?php echo $hoadon['KetQuaDT'];?>">
					<b>Tên khách hàng</b>
					<select name="makh" class="form-control">
						<?php foreach($khachhang as $row) { ?>
							<option value="<?php echo $row['MaKhachHang'];?>" 
								<?php if($row['MaKhachHang']==$hoadon['MaKhachHang']) 
							{ echo "selected"; } ?>
							> <?php echo $row['TenKhachHang'];?>
						</option>
					<?php } ?>
				</select>

				<b>Mã giới thiệu</b>
				<input type="text" name="magioithieu" class="form-control"value="<?php echo $hoadon['MaGioiThieu'];?>">
				<b>Phần trăm giảm giá</b>
				<input type="text" name="ptgg" class="form-control" value="<?php echo $hoadon['PhanTramGiamGia'];?>">
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
