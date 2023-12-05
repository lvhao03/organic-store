@extends('admin.admin-layout')
@section('title')
    Danh sách danh mục
@endsection
@section('header')
    Danh sách danh mục
@endsection
@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categoryList as $category)
        <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->name}}</td>
            <td>
            <a href="/admin/category/edit/{{$category->id}}"><button class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></button></a>
                <a href="/admin/category/delete/{{$category->id}}"><button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="/admin/category/add"><button class="btn btn-primary">Thêm</button></a>
@endsection