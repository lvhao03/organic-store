<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    function index(){ return view("admin/index"); }
    function login(){ return view("frontend.login"); }
    function register(){ return view("frontend.register"); }

    function login_( Request $request ){  
        if(auth()->guard('admin')
        ->attempt(['email' => $request['email'],'password'=>$request['password']])){
            $user = auth()->guard('admin')->user();
            session()->put('user', $user);
            if($user->role == 1) return redirect('/admin');
            return redirect('/');
        }
        return redirect('/login')->with('thongbao', 'Email hoặc mật khẩu sai');
    }

    function register_(Request $request){
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        return redirect('/login');
    }
    function logout(){ 
        auth()->guard('admin')->logout();
        session()->forget('user');
        return redirect('/')->with('thongbao','Bạn đã thoát admin');
    }
}
