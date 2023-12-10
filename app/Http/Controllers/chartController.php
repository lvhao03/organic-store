<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class chartController extends Controller
{
    function index(){
        $data = Order::selectRaw('date, SUM(total_money) as total_money')
        ->groupBy('date')
        ->get();
        return view('admin.chart.chart', ['data' => $data]);
    }
}
