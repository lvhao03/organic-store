@extends('admin.admin-layout')
@section('title')
    Chỉnh sửa bình luận
@endsection
@section('header')
    Chỉnh sửa bình luận
@endsection
@section('content')
<form action="/admin/category/edit" method="post">
  @csrf
  <input hidden type="text" name="id" class="form-control" id="exampleInputPassword1" value="{{$category->id}}">
  <div class="form-group">
    <label for="exampleInputPassword1">Tên danh mục</label>
    <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Nhập tên danh mục" value="{{$category->name}}">
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
</form>
@endsection