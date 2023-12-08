@extends('admin.admin-layout')
@section('title')
    Chi tiết đơn hàng
@endsection
@section('header')
    Chi tiết đơn hàng
@endsection
@section('content')
<h2>Thông tin đơn hàng</h2>
<p>Người nhận: {{$order->name}}</p>
<p>Số điện thoại: {{$order->address}}</p>
<p>Điện thoại: {{$order->phone}}</p>
<p>Trạng thái đơn hàng:</p>
<form action="">
    <select name="status" id="">
        <option value="0">Đang xử lý</option>
        <option value="1">Hoàn tất</option>
    </select>
    <a href="/admin/order/edit"><button class="btn btn-primary">Chỉnh sửa</button></a>
</form>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Giá</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Tổng tiền</th>
        </tr>
    </thead>
    <tbody>
  
    </tbody>
</table>
@endsection