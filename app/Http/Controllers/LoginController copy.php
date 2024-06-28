<?php

namespace App\Http\Controllers;

use GroceryCrud\Core\Validate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }
    
    public function login_proses(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(Auth::attempt($data)){
            $post = DB::select('SELECT * FROM users where email=?',array($request->email));
            foreach($post as $row){
                Session::put('name',$row->name);
            }
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login')->with('failed','Periksa email atau password Anda!');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('login')->with('alert','Anda telah logout');
    }    
}
