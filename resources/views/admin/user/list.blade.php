@extends('admin.admin-layout')
@section('title')
    Danh sách người dùng
@endsection
@section('header')
    Danh sách người dùng
@endsection
@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên người dùng</th>
            <th scope="col">Email</th>
            <th scope="col">Vai trò</th>
            <th scope="col">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($userList as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                @if($user->role == 1) 
                    Admin
                @else
                    Người dùng
                @endif
            </td>
            <td>
            <a href="/admin/user/edit/{{$user->id}}"><button class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></button></a>
                <a href="/admin/user/delete/{{$user->id}}"><button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="/admin/user/add"><button class="btn btn-primary">Thêm</button></a>
@endsection