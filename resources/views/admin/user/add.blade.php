@extends('admin.admin-layout')
@section('title')
    Thêm người dùng
@endsection
@section('header')
    Thêm người dùng
@endsection
@section('content')
<form action="/admin/user/add" method="post">
  @csrf
  <div class="form-group">
    <label for="exampleInputPassword1">Tên người dùng</label>
    <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Nhập tên người dùng">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mật khẩu</label>
    <input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" name="email" class="form-control" id="exampleInputPassword1" placeholder="Nhập email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Vai trò</label>
    <select class="form-control" name="role" id="">
      <option value="1">Admin</option>
      <option value="0">Người dùng</option>
    </select>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection