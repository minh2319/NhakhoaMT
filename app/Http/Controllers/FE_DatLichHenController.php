<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lichkham;
use DateTime;
use App\bacsi;

class FE_DatLichHenController extends Controller
{
    public function postDatLich(Request $req)
    {
        //$gio=$req->time;
        //$ngay=$req->date;
        //$datetime= new DateTime($ngay->date_format('Y-m-d').''.$gio->time_format('H:i:s'));
        //echo $datetime;
    	$this->validate($req,
            [
                'name'=>'required',
                'phone'=>'required|min:9|max:11',
                'email'=>'required|email',
                'datetime'=>'required',
                'message'=>'required'
            ],
            [
                /*'name.required'=>'Vui lòng nhập họ và tên',
                'phone.required'=>'Vui lòng nhập số điện thoại',
                'phone.min'=>'Số điện thoại bạn nhập không hợp lệ',
                'phone.max'=>'Số điện thoại bạn nhập không hợp lệ',
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'datetime.required'=>'Vui lòng chọn ngày hẹn',
                'message.required'=>'Vui lòng cho biết sơ về tình trạng của bạn'*/
            ]);
        $lichkham=new lichkham;
    	$lichkham->MaBacSi=$req->doctor;
    	$lichkham->NgayKham=$req->datetime;
    	$lichkham->LoiNhan=$req->message;
    	$lichkham->TrangThai='1';
    	$lichkham->TenKhachHang=$req->name;
    	$lichkham->SDT=$req->phone;
    	$lichkham->Email=$req->email;
    	$lichkham->save();
        
        $bacsi=bacsi::all();
        foreach($bacsi as $dt)
            if($dt->MaBacSi==$req->doctor) 
                $namedt=$dt->TenBacSi;


        $name=$req->input('name');
        $sdt=$req->input('phone');
        $email=$req->input('email');
        $datetime=$req->input('datetime');
        //$doctor=$req->input('doctor');
        $doctor=$namedt;
        $message=$req->input('message');

        //return view('page.xacnhanlichhen')->with(['success'=>'Đặt lịch thành công','name'=>$name,'phone'=>$sdt,'email'=>$email,'datetime'=>$datetime,'doctor'=>$doctor,'message'=>$message]);
        return view('page.xacnhanlichhen', ['name' => $name,'phone'=>$sdt,'email'=>$email,'datetime'=>$datetime,'doctor'=>$doctor,'message'=>$message])->with('thongbao','Đặt lịch thành công');
        
        //return redirect()->route('xacnhandatlich')->with('success', 'Đặt lịch thành công');
    	//return redirect()->back()->with('thongbao', 'Đặt lịch thành công');
    }
    public function getDatLich()
    {
        return view('page.xacnhanlichhen',compact('lichkham'));
    }
}
