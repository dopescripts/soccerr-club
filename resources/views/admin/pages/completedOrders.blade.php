@extends('admin.layout.app')

@section('title', 'Pending Orders - ')

@section('content')
    <div class="content-wrapper">
        <div class="page-header d-flex justify-content-between">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-warning text-white mr-2">
                    <i class="mdi mdi-shopping"></i>
                </span> Completed Orders
            </h3>
        </div>
        <div class="row w-100">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th> Client Name </th>
                                    <th> Order No </th>
                                    <th> Total Cost </th>
                                    <th> Placement Date </th>
                                    <th> View Products </th>
                                    <th>Completed/Rejected</th>
                                </tr>
                            </thead>
                            @if ($orders->count() > 0)
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>
                                                <img src="/admin/assets/images/faces/avatar placeholder.png" alt="image" />
                                                <span class="pl-2">{{ $order->user->name }}</span>
                                            </td>
                                            <td title="{{ $order->order_number, 7 }}"> {{ $order->order_number }} </td>
                                            <td> ${{ $order->total_price }} </td>
                                            <td> {{ Str::limit($order->created_at, 11) }} </td>
                                            <td><a href="{{ route('order.details', $order->order_number) }}" class="btn btn-secondary">View Products</a></td>
                                            <td>
                                                <span class="badge badge-success">Completed</span>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                            @else
                                No orders found
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
