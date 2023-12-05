@extends('admin.admin-layout')
@section('title')
    Chỉnh sửa sản phẩm
@endsection
@section('header')
    Chỉnh sửa sản phẩm
@endsection
@section('content')
<form action="/admin/product/edit" method="post">
  @csrf
  <input hidden type="text" name="id" class="form-control" id="exampleInputPassword1" placeholder="Nhập nội dung" value="{{$product->id}}">
  
  <div class="form-group">
    <label for="exampleInputPassword1">Tên sản phẩm </label>
    <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Nhập mô tả" value="{{$product->name}}">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Giá</label>
    <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="Nhập mô tả" value="{{$product->price}}">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Tên danh mục</label>
    <select class="form-control" name="category_id" id="">
      <option value="{{$product->category_id}}">{{$product->name}}</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mô tả</label>
    <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="Nhập mô tả" value="{{$product->description}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Số hàng tồn</label>
    <input type="text" name="stock_quantity" class="form-control" id="exampleInputPassword1" placeholder="Nhập số hàng tốn" value="{{$product->stock_quantity}}">
  </div>
  <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
</form>
@endsection