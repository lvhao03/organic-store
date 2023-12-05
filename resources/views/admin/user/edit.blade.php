@extends('admin.admin-layout')
@section('title')
    Chỉnh sửa người dùng
@endsection
@section('header')
    Chỉnh sửa người dùng
@endsection
@section('content')
<form action="/admin/user/edit" method="post">
  @csrf
  <input  hidden type="text" name="id" value="{{$user->id}}">
  <div class="form-group">
    <label for="exampleInputPassword1">Tên người dùng</label>
    <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Nhập tên người dùng" value="{{$user->name}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" name="email" class="form-control" id="exampleInputPassword1" placeholder="Nhập email" value="{{$user->email}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Vai trò</label>
    <select class="form-control" name="role" id="">
      <option value="1">Admin</option>
      <option value="0">Người dùng</option>
    </select>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
</form>
@endsection