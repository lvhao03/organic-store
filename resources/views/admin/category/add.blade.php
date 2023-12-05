@extends('admin.admin-layout')
@section('title')
    Thêm bình luận
@endsection
@section('header')
    Thêm bình luận
@endsection
@section('content')
<form action="/admin/category/add" method="post">
  @csrf
  <div class="form-group">
    <label for="exampleInputPassword1">Tên danh mục</label>
    <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Nhập tên danh mục">
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection