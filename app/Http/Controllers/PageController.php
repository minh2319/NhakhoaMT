<?php
namespace App\Http\Controllers;
use Session;
use Hash;
use Auth;
use App\User;
use App\bacsi;
use App\slide;

use Illuminate\http\Requeest;
class PageController extends Controller
{
	public function getIndex()
	{
		$doctor=bacsi::all();
		$slide=slide::all();
		return view('page.trangchu',compact('doctor','slide'));
	}
	public function getLienhe()
	{	
		$id = 1;
		// $bacsi=bacsi::where('MaBacSi',1)->get();
		$bacsi=bacsi::find(1);
		return view('page.lienhe',['bacsi'=>$bacsi]);
	}
	public function getLoaidichvu()
	{


	}
	public function test(){

	}
}