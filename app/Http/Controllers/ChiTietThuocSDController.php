<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\chitietthuocsudung;
use App\thuoc;

class ChiTietThuocSDController extends Controller
{
	public function showlist(){
		$chitietthuocsudung=chitietthuocsudung::all();
		$thuoc=thuoc::all();
		return view("admin.chitietthuocsd",compact('chitietthuocsudung','thuoc'));
	}
}
