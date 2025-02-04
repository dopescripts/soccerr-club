@extends('admin.layout.app')

@section('title', 'Pending Orders - ')

@section('content')
    <div class="content-wrapper">
        <div class="page-header d-flex justify-content-between">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-warning text-white mr-2">
                    <i class="mdi mdi-shopping"></i>
                </span> Pending Orders
            </h3>
        </div>
        <div class="row w-100">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
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
                                            <span class="pl-2">{{ $order->cart->user->name }}</span>
                                        </td>
                                        <td title="{{ $order->order_number, 7 }}"> {{ $order->order_number }} </td>
                                        <td> ${{ $order->cart->getTotalAttribute() }} </td>
                                        <td> {{ Str::limit($order->created_at, 11) }} </td>
                                        <td><button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#viewProducts{{ $order->id }}">View Products</button></td>
                                        <td>
                                            <div class="d-flex">
                                                <form action="{{ route('approve.order') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="order_id" id="order" value="{{$order->id}}">
                                                    <button class="btn btn-success mr-2" type="submit">Approve</button>
                                                </form>
                                                <form action="" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit">Reject</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="viewProducts{{ $order->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Products</h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="position-relative">
                                                        @foreach ($order->cart->cartItems as $cartitem)
                                                            <a href="{{ route('product', $cartitem->product->slug) }}" class="text-decoration-none link-primary" target="_blank">
                                                                <div class="ms-2 d-flex align-items-center my-3">
                                                                    <div class="d-sm-flex gap-3 justify-content-between align-items-center w-100">
                                                                        <div class="d-md-flex align-items-center gap-3">
                                                                            <div class="col-lg-3 position-relative p-2">
                                                                                <img src="{{ asset('storage/uploads/products' . '/' . $cartitem->product->thumb) }}" alt="" class="img-fluid rounded border border-dark-subtle p-2 bg-white" />
                                                                            </div>
                                                                            <p class="my-0">{{ $cartitem->product->name }}</p>
                                                                        </div>
                                                                        <div>
                                                                            <span class="fw-semibold">{{ "$" . $cartitem->sub_total }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <div>
                                                                Quantity: {{ $cartitem->quantity }}
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                            @else
                            No pending orders left
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
