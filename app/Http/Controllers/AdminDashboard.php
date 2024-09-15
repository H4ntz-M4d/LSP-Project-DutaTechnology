<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
   public function dashboard(){
    return view('admin.dashboard', [
        'judul_menu' => 'Dashboard',
        'judul_link' => ['Edit Home', 'Partners'],
        'link' => '/home'
    ]);
   }
}
