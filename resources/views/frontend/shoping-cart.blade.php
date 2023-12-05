@extends('layouts.frontend-site')
@section('title')
    Trang giỏ hàng
@endsection
@section('main')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->


    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cart = session('cart');
                                    $totalMoney = 0;
                                @endphp
                                @foreach($cart as $item)
                                @php
                                    $id = $item['id'];
                                    $quantity = $item['quantity'];
                                    $product = \DB::table('product')
                                        ->where('product.id', '=', $id)
                                        ->join('category', 'product.category_id', 'category.id')
                                        ->select('category.name as category_name', 'product.id', 'product.name', 'product.price', 'description', 'image_url', 'stock_quantity' , 'product.category_id')
                                        ->first();
                                    $total = $quantity * $product->price;
                                    $totalMoney += $total;
                                @endphp
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img width="150px" src="{{asset('site/img/product')}}/{{$product->image_url}}" alt="">
                                        <h5>{{$product->name}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{number_format($product->price , 0 , ',')}} đ
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{$quantity}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                    {{number_format($total , 0 , ',')}} đ
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="/deleteCart/{{$product->id}}"><span class="icon_close"></span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="/shop" class="primary-btn cart-btn">Tiếp tục mua sắm</a>
                        <a href="/deleteAllCart" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Xóa giỏ hàng</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Mã giảm giá</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">Áp dụng</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Tổng tiền</h5>
                        <ul>
                            <li>Phí ship <span>0đ</span></li>
                            <li>Tổng tiền <span>{{number_format($totalMoney , 0 , ',')}} đ</span></li>
                        </ul>
                        <a href="#" class="primary-btn">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection