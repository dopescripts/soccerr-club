@extends('admin.layout.app')

@section('title', 'Products - ')

@section('content')
<div class="content-wrapper">
    <div class="page-header d-flex justify-content-between">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-warning text-white mr-2">
                <i class="mdi mdi-package-variant"></i>
            </span> Products
        </h3>
        <a href="{{ route('products.create') }}" class="btn btn-primary btn-lg btn-icon-text d-inline-flex">
            <i class="mdi mdi-plus-circle btn-icon-prepend"></i> Add Products
        </a>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if ($errors->any())
                    <ul class="text-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                <div class="card-body table-responsive">

                    @if ($products->count() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Thumbnail</th>
                                <th>Quantity</th>
                                <th>Vendor</th>
                                <th>Images</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->category->name}}</td>
                                <td title="{{ $product->name }}">{{ Str::words($product->name, 3) }}</td>
                                <td>
                                    <button class="btn btn-inverse-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#descriptionModal{{ $product->id }}">
                                        Show Description
                                    </button>
                                </td>
                                <td class="text-center">@if ($product->is_active == 1)
                                    <span class="badge bg-success">Active</span>
                                    <form action="{{ route('product.deactivate', $product->id) }}" class="mt-1">
                                        <button type="submit" class="btn btn-danger btn-sm font-bold">Deactivate</button>
                                    </form>
                                    @else
                                    <span class="badge bg-danger">Inactive</span>
                                    <form action="{{ route('product.activate', $product->id) }}" class="mt-1">
                                        <button type="submit" class="btn btn-success btn-sm font-bold">Activate</button>
                                    </form>
                                    @endif
                                </td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->discount_percentage * 100 }}%</td>
                                <td>
                                    <img src="{{ asset('storage/uploads/products') . '/' . $product->thumb }}"
                                        width="100" class="object-fit-cover" alt="{{ $product->name }} Thumbnail">
                                </td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->vendor->name }}</td>
                                <td><button class="btn btn-inverse-primary"
                                        data-bs-target="#imagesModal{{ $product->id }}" data-bs-toggle="modal">View
                                        Images</button></td>
                                <td>
                                    <a href="{{ route('products.edit', $product->slug) }}" class="btn btn-primary">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="GET">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="descriptionModal{{ $product->id }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Description</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div>{!! $product->description !!}</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="imagesModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Images</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex flex-wrap justify-content-around my-3">
                                                @php
                                                $images = $product->images;
                                                $imagesArray = json_decode($images, true);
                                                @endphp

                                                @foreach ($imagesArray as $image)
                                                <img src="{{ asset('storage/' . $image) }}" alt="Product Image"
                                                    width="100">
                                                @endforeach


                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="d-flex justify-content-center">
                        <h4 class="text-muted"><i class="mdi mdi-alert"></i> No records found</h4>
                    </div>
                    @endif
                </div>
                <div class="my-4 mx-3">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection