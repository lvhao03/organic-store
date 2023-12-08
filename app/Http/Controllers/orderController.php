<?php

namespace App\Http\Controllers;
use App\Mail\checkoutMail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class orderController extends Controller
{
    function index(){
        return view('frontend.checkout');
    }

    function index_(Request $request){
        $user = session('user');
        $cart = session('cart');
        $order = Order::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'note' => $request['note'],
            'total_money' => $request['totalMoney'],
            'user_id' => $user['id'],
        ]);
        foreach($cart as $item){
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity']
            ]);
        }
        $checkoutMail = new checkoutMail();
        $user = session('user');
        Mail::to($user->email)->send($checkoutMail);
        session()->forget('cart');
        return view('frontend.index', ['productList' => Product::with('category')->get()]);
    }

    function adminIndex(){
        return view('admin.order.list', ['orderList' => Order::all()] );
    }

    function edit($id){
        return view('admin.order.edit',[
            'order' => Order::find($id),
        ]);
    }

    function edit_(){

    }
}
