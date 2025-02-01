@extends('admin.layout.app')

@section('title', 'Add Products - ')

@section('content')
    <div class="content-wrapper">
        <div class="page-header d-flex justify-content-between">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-warning text-white mr-2">
                    <i class="mdi mdi-package-variant"></i>
                </span> Users on Website
            </h3>
        </div>
        <div class="row w-100">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Items in Cart</th>
                                    <th>Items in Wishlist</th>
                                    <th>Orders</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if ($user->cart != Null)
                                    <td>{{ $user->cart->cartItems->count() }}</td>
                                    @else
                                    <td>No cart exists</td>
                                    @endif
                                    <td>{{ $user->wishlist()->count() }}</td>
                                    <td>Null</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="my-3">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
