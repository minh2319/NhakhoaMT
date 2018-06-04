<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khunggiolamviec extends Model
{
    //
	protected $table='khunggiolamviec';
	public $timestamps = false;
	protected $primaryKey = 'MaKhungGioLamViec';


	public function lichlamviec()
	{
		return $this->belongsTo('App\lichlamviec','MaLich','MaLich');
	}
}
