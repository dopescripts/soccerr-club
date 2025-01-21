@extends('admin.layout.app')

@section('title', 'Categories - ')

@section('content')

    <div class="content-wrapper">
        <div class="page-header d-flex justify-content-between">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-warning text-white mr-2">
                    <i class="mdi mdi-dns"></i>
                </span> Categories
            </h3>
            <button class="btn btn-primary btn-lg btn-icon-text d-inline-flex" type="button" data-bs-toggle="modal" data-bs-target="#categoryModal"><i class="mdi mdi-plus-circle btn-icon-prepend"></i>
                Add Category</button>
            <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header align-items-center">
                            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                            <button class="btn btn-icon" data-bs-dismiss="modal" aria-label="Close">
                                <span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('store.category') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="category_name" class="col-form-label">Category Name:</label>
                                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="example: Shoes">
                                </div>
                                <div class="form-group">
                                    <label>File upload</label>
                                    <input type="file" name="category_img" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                  </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
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
                            </ul>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>No. of items</th>
                                    <th>category image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($categories->count() > 0)
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>0</td>
                                            <td><img src="{{ asset('public/' . $category->image) }}" alt="" class="img-fluid"></td>
                                            <td>
                                                <!-- Pass category data to the edit modal -->
                                                <button class="btn btn-success" data-bs-target="#CategoryEditModal{{ $category->id }}" data-bs-toggle="modal">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <form action="{{ route('delete.category', $category->id) }}" method="get">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="CategoryEditModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header align-items-center">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                        <button class="btn btn-icon" data-bs-dismiss="modal" aria-label="Close">
                                                            <span><i class="mdi mdi-close"></i></span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ route('update.category', $category->id) }}" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="category_name" class="col-form-label">Category Name:</label>
                                                                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="example: Shoes" value="{{ $category->name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>File upload</label>
                                                                <input type="file" name="category_img" class="file-upload-default">
                                                                <div class="input-group col-xs-12">
                                                                    <input type="text" class="form-control file-upload-info" value="{{ $category->image }}" disabled="" placeholder="Upload Image">
                                                                    <span class="input-group-append">
                                                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="container">
                                                                <img src="{{ asset('public/' . $category->image) }}" alt="" class="img-fluid">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No records found</p>
                                @endif
                            </tbody>
                        </table>
                        <div>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            @if(session('toast_error'))
                $.toast({
                    heading: 'Delete',
                    text: '{{ session('toast_error') }}',
                    icon: 'error',
                    loaderBg: '#46c35f',
                    position: 'top-right'
                });
            @endif
        });
    </script>    
@endsection