@extends('admin.admin-layout')
@section('title')
    Danh sách bình luận
@endsection
@section('header')
    Danh sách bình luận
@endsection
@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Giá</th>
            <th scope="col">Hàng tồn</th>
            <th scope="col">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productList as $product)
        <tr>
            <th scope="row">{{$product->id}}</th>
            <td><img width="100px" src="{{asset('site/img/product')}}/{{$product->image_url}}" alt=""></td>
            <td>{{$product->category->name}}</td>
            <td>{{$product->name}}</td>
            <td>{{number_format($product->price , 0 , ',')}} đ</td>
            <td>{{$product->stock_quantity}}</td>
            <td>
            <a href="/admin/product/edit/{{$product->id}}"><button class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></button></a>
                <a href="/admin/product/delete/{{$product->id}}"><button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="/admin/product/add"><button class="btn btn-primary">Thêm</button></a>
@endsection