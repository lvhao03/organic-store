<?php

namespace App\Http\Controllers;
use App\Mail\welcomeMail;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class adminController extends Controller
{
    function index(){
        
        return view("admin.main", [
            'userCount' => User::count(), 
            'orderCount' => Order::count(),
            'totalMoney' => Order::sum('total_money'),
            'orderList' => Order::orderBy('created_at', 'desc')->get()
        ]); 
    }
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
        return redirect('/login');
    }

    function register_(Request $request){
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        $welcomeMail = new WelcomeMail();

        Mail::to($request['email'])->send($welcomeMail);

        return redirect('/login');
    }
    function logout(){ 
        auth()->guard('admin')->logout();
        session()->forget('user');
        return redirect('/')->with('thongbao','Bạn đã thoát admin');
    }
}
