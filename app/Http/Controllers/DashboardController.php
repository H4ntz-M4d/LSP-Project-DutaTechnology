<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class DashboardController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    //
    public function dashboard(){
        // untuk menu
        $postMenu = DB::select('SELECT * FROM menus');
        $postAplikasi = DB::select('SELECT * FROM aplikasi');
        return view('dashboard.dashboard',['judul'=>'Dashboard','menu'=>$postMenu,'aplikasi'=>$postAplikasi,'active'=>["dashboard",""],"posisi"=>0]);
        var_dump('');
    }
    
}
