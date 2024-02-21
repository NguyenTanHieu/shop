@extends('master.admin')
@section('main')
@section('title', 'chi tiết đơn hàng')

@if ($order->status != 2)
    @if ($order->status != 3)
        <a href="{{ route('order.update', $order->id) }}?status=2" class="btn btn-danger"
            onclick="return confirm('Bạc có chắc hành động này là gì')">Đã giao hàng</a>
        <a href="{{ route('order.update', $order->id) }}?status=3" class="btn btn-warning"
            onclick="return confirm('Bạc có chắc hành động này là gì')">Đã Hủy</a>
    @else
        <a href="{{ route('order.update', $order->id) }}?status=3" class="btn btn-warning"
            onclick="return confirm('Bạc có chắc hành động này là gì')">Khôi phục</a>
    @endif
@endif
<div class="row">
    <div class="col-md-6">
        <h3>Thông tin khách hàng</h3>
        <table class="table">
            <thead>
                <tr>
                    <td>Họ tên</td>
                    <td>{{ $auth->name }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{ $auth->phone }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $auth->address }}</td>
                </tr>
            </thead>
        </table>
    </div>
    <div class="col-md-6">
        <h3>Thông tin giao hàng</h3>
        <table class="table">
            <thead>
                <tr>
                    <td>Họ tên</td>
                    <td>{{ $order->name }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{ $order->phone }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $order->address }}</td>
                </tr>
            </thead>
        </table>
    </div>
</div>
<h3>Thông tin sản phẩm </h3>
<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Image</th>
            <th>Product name</th>
            <th>Product quantity</th>
            <th>Product Price</th>
            <th>Sub Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->details as $item)
            <tr>
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td><img src="uploads/product/{{ $item->product->image }}" alt="" width="40"
                        height="40"></td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->price) }}</td>
                <td>{{ number_format($item->price * $item->quantity) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


@stop()
