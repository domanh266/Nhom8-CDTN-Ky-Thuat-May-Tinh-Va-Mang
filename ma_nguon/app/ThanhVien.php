<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ThanhVien extends Model
{
    protected $table = 'thanh_vien';
    public $timestamps = false;

    public static function kiemTraDangNhap($email, $mat_khau) {
    	$tv = DB::table('thanh_vien')
            ->where('email', '=', "$email")
            ->where('mat_khau', '=', "$mat_khau")
            ->count();
        return $tv;
    }

}
