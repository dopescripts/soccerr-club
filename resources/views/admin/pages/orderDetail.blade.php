@extends('admin.layout.app')

@section('title', 'Pending Orders - ')

@section('content')
    <div class="content-wrapper">
        <div class="page-header d-flex justify-content-between">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-warning text-white mr-2">
                    <i class="mdi mdi-shopping"></i>
                </span> Order Detail
            </h3>
        </div>
        <div class="row w-100">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        @php
                            $orderProducts = json_decode($order->order_items, true);
                        @endphp
                        <div class="position-relative">
                            <table class="table table-bordered text-white">
                                <thead>
                                    <tr>
                                        <th>Order No.</th>
                                        <th>Product ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderProducts as $item)
                                        <tr>
                                            <td><a href="{{ route('completed.orders') }}">{{ $order->order_number }}</a></td>
                                            <td>{{ $item['product_id'] }}</td>
                                            <td>{{ $item['product_name'] }}</td>
                                            <td>${{ number_format($item['price'], 2) }}</td>
                                            <td>{{ $item['quantity'] }}</td>
                                            <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
