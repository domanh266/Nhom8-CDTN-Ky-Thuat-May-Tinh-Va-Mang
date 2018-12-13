<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HangSanXuat extends Model
{
    protected $table = 'hang_san_xuat';
    public $timestamps = false;

    public static function layDanhSachHangSanXuat() {
    	$hsx = DB::table('hang_san_xuat')
            ->select('id', 'ten')
            ->orderBy('ten', 'asc')
            ->get();
        return $hsx;    
    }
}
