@extends('admin.layout.app')
@section('title', 'Vendors - ')
@section('content')
<div class="content-wrapper">
    <div class="page-header d-flex justify-content-between">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-warning text-white mr-2">
                <i class="mdi mdi-store"></i>
            </span> Vendors
        </h3>
        <button class="btn btn-primary btn-lg btn-icon-text d-inline-flex" type="button" data-bs-toggle="modal" data-bs-target="#vendorModal"><i class="mdi mdi-plus-circle btn-icon-prepend"></i>
            Add Vendors</button>
        <div class="modal fade" id="vendorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header align-items-center">
                        <h5 class="modal-title" id="exampleModalLabel">Add Vendors</h5>
                        <button class="btn btn-icon" data-bs-dismiss="modal" aria-label="Close">
                            <span><i class="mdi mdi-close"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('vendor.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="role" value="vendor">
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-3 d-flex gap-4 align-items-center justify-content-between col-11">
                                <label for="password">Password</label>
                                <div class="col-md-8 me-auto">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password">
                                </div>
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body table-responsive">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                            @if ($success->any())
                                <li class="text-success">{{ $success }}</li>
                            @endif
                        </ul>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Products</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($vendor->count() > 0)
                                @foreach ($vendor as $vendor)
                                    <tr>
                                        <td>{{ $vendor->id }}</td>
                                        <td>{{ $vendor->name }}</td>
                                        <td>{{ $vendor->email }}</td>
                                        <td>{{ $vendor->products->count() }}</td>
                                        <td>
                                            <a href="{{ route('delete.vendor', $vendor->id) }}" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <p>No records found</p>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection