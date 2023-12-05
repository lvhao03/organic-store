@extends('admin.admin-layout')
@section('title')
    Thêm bình luận
@endsection
@section('header')
    Thêm bình luận
@endsection
@section('content')
<form action="/admin/product/add" method="post">
  @csrf
  <input hidden type="text" name="id" class="form-control" id="exampleInputPassword1" placeholder="Nhập nội dung">
  
  <div class="form-group">
    <label for="exampleInputPassword1">Tên sản phẩm</label>
    <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Nhập nội dung">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Giá</label>
    <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="Nhập nội dung">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Danh mục</label>
    <select class="form-control" name="category_id" id="">
        @foreach($categoryList as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mô tả</label>
    <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="Nhập nội dung">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Số hàng tốn</label>
    <input type="text" name="stock_quantity" class="form-control" id="exampleInputPassword1" placeholder="Nhập số sao">
  </div>
  <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection