<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class orderController extends Controller
{
    function index(){
        return view('frontend.checkout');
    }

    function index_(Request $request){
        $user = session('user');
        Order::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'note' => $request['note'],
            'total_money' => $request['totalMoney'],
            'user_id' => $user['id'],
        ]);
        return view('frontend.shop', ['productList' => Product::with('category')->get()]);
    }
}
