@extends('admin.admin-layout')
@section('title')
    Admin
@endsection
@section('header')
    Dashboard
@endsection
@section('content')
    <ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1020</h3>
						<p>Số đơn hàng</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>{{$userCount}}</h3>
						<p>Người dùng</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>{{number_format($totalMoney , 0, ',')}} đ</h3>
						<p>Lợi nhuận</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Đơn hàng gần nhất</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Người dùng</th>
								<th>Ngày mua</th>
								<th>Tình trạng</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orderList as $order)
							<tr>
								<td>
									<img src="img/people.png">
									<p></p>
								</td>
								<td>{{$order->created_at}}</td>
								<td>
									@if ($order->status == 0)
									<span class="status peding">Chờ xác nhận</span>
									@elseif($order->status == 1)
									<span class="status completed">Đang xử lý</span>
									@else
									<span class="status completed">Hoàn tất </span>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>Todos</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div>
			</div>
@endsection