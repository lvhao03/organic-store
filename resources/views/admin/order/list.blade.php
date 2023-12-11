@extends('admin.admin-layout')
@section('title')
    Danh sách đơn hàng
@endsection
@section('header')
    Danh sách đơn hàng
@endsection
@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên người dùng</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Ngày mua</th>
            <th scope="col">Tình trạng</th>
            <th scope="col">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orderList as $order)
        <tr>
            <th scope="row">{{$order->id}}</th>
            <td>{{$order->name}}</td>
            <td>{{number_format($order->total_money , 0 , ',')}} đ</td>
            <td>{{$order->created_at}}</td>
            <td>{{$order->status}}</td>
            <td>
            <a href="/admin/order/edit/{{$order->id}}"><button class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></button></a>
                <a href="/admin/order/delete/{{$order->id}}"><button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="/admin/order/add"><button class="btn btn-primary">Thêm</button></a>
@endsection