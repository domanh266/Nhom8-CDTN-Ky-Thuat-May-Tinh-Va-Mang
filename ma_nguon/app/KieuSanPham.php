<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KieuSanPham extends Model
{
    protected $table = 'kieu_san_pham';
    public $timestamps = false;

    public static function layDanhSachKieuSanPham() {
    	$ksp = DB::table('kieu_san_pham')
            ->join('loai_san_pham', 'kieu_san_pham.id_loai_san_pham', '=', 'loai_san_pham.id')
            ->select('kieu_san_pham.id', 'kieu_san_pham.ten as ten_kieu_san_pham', 'loai_san_pham.ten as ten_loai_san_pham')
            ->orderBy('ten_loai_san_pham', 'asc')
            ->paginate(10);
        return $ksp;    
    }

    public static function timKieuSanPham($ten) {
    	$ksp = DB::table('kieu_san_pham')
            ->join('loai_san_pham', 'kieu_san_pham.id_loai_san_pham', '=', 'loai_san_pham.id')
            ->select('kieu_san_pham.id', 'kieu_san_pham.ten as ten_kieu_san_pham', 'loai_san_pham.ten as ten_loai_san_pham')
            ->where('kieu_san_pham.ten', 'like', "%$ten%")
            ->orderBy('ten_kieu_san_pham', 'asc')
            ->paginate(10);
        return $ksp;    
    }

}
