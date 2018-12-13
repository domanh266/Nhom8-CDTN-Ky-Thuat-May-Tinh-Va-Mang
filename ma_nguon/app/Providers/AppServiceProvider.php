<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\LoaiSanPham;
use App\KieuSanPham;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $menu_loai_san_pham = DB::table('loai_san_pham')
                ->limit(4)
                ->get();
        $menu_kieu_san_pham_theo_loai = array();
        foreach($menu_loai_san_pham as $lsp)
            $menu_kieu_san_pham_theo_loai[$lsp->id] = DB::table('kieu_san_pham')
                ->where('id_loai_san_pham', '=', $lsp->id)    
                ->limit(5)
                ->get();              
        View::share('menu_loai_san_pham', $menu_loai_san_pham);
        View::share('menu_kieu_san_pham_theo_loai', $menu_kieu_san_pham_theo_loai);       
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
