<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
@php
    use App\Models\Product;
    $cart = session('cart');
    $i = 1;
@endphp
<table class="table">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Giá</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Tổng tiền</th>
    </tr>
    @foreach($cart as $item)
    @php
        $product = Product::find($item['id']);
        $total = $product->price * $item['quantity'];
    @endphp
    <tr>
        <td>{{$i}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$item['quantity']}}</td>
        <td>{{$total}} đ</td>
    </tr>
    @php 
        $i++;
    @endphp 
    @endforeach
</table>