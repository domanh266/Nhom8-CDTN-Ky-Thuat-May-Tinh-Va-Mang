<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DonHangChiTiet extends Model
{
    protected $table = 'don_hang_chi_tiet';
    public $timestamps = false;

    //ADMIN
    public static function layDonHangChiTiet($id_don_hang) {
    	$dhct = DB::table('don_hang_chi_tiet')
    		->join('san_pham', 'don_hang_chi_tiet.id_san_pham', '=', 'san_pham.id')
            ->select('anh', 'ten', 'gia', 'don_hang_chi_tiet.so_luong as so_luong')
            ->where('id_don_hang', '=', $id_don_hang)
            ->get();
        return $dhct;
    }
}
