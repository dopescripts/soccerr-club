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
                                @foreach ($success->all() as $error)
                                    <li class="text-success">{{ $error }}</li>
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
                                @if ($category->count() > 0)
                                    @foreach ($category as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>0</td>
                                            <td><img src="{{ asset('public/' . $category->image) }}" alt="" class="img-fluid"></td>
                                            <td>
                                                <!-- Pass category data to the edit modal -->
                                                <button class="btn btn-success" data-bs-target="#CategoryEditModal" data-bs-toggle="modal">
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
                                        <div class="modal fade" id="CategoryEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title">Messages</h4>
                            <p class="text-muted mb-1 small">View all</p>
                        </div>
                        <div class="preview-list">
                            <div class="preview-item border-bottom">
                                <div class="preview-thumbnail">
                                    <img src="/admin/assets/images/faces/face6.jpg" alt="image" class="rounded-circle" />
                                </div>
                                <div class="preview-item-content d-flex flex-grow">
                                    <div class="flex-grow">
                                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                            <h6 class="preview-subject">Leonard</h6>
                                            <p class="text-muted text-small">5 minutes ago</p>
                                        </div>
                                        <p class="text-muted">Well, it seems to be working now.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-item border-bottom">
                                <div class="preview-thumbnail">
                                    <img src="/admin/assets/images/faces/face8.jpg" alt="image" class="rounded-circle" />
                                </div>
                                <div class="preview-item-content d-flex flex-grow">
                                    <div class="flex-grow">
                                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                            <h6 class="preview-subject">Luella Mills</h6>
                                            <p class="text-muted text-small">10 Minutes Ago</p>
                                        </div>
                                        <p class="text-muted">Well, it seems to be working now.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-item border-bottom">
                                <div class="preview-thumbnail">
                                    <img src="/admin/assets/images/faces/face9.jpg" alt="image" class="rounded-circle" />
                                </div>
                                <div class="preview-item-content d-flex flex-grow">
                                    <div class="flex-grow">
                                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                            <h6 class="preview-subject">Ethel Kelly</h6>
                                            <p class="text-muted text-small">2 Hours Ago</p>
                                        </div>
                                        <p class="text-muted">Please review the tickets</p>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-item border-bottom">
                                <div class="preview-thumbnail">
                                    <img src="/admin/assets/images/faces/face11.jpg" alt="image" class="rounded-circle" />
                                </div>
                                <div class="preview-item-content d-flex flex-grow">
                                    <div class="flex-grow">
                                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                            <h6 class="preview-subject">Herman May</h6>
                                            <p class="text-muted text-small">4 Hours Ago</p>
                                        </div>
                                        <p class="text-muted">Thanks a lot. It was easy to fix it .</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Portfolio Slide</h4>
                        <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
                            <div class="item">
                                <img src="/admin/assets/images/dashboard/Rectangle.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="/admin/assets/images/dashboard/Img_5.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="/admin/assets/images/dashboard/img_6.jpg" alt="">
                            </div>
                        </div>
                        <div class="d-flex py-4">
                            <div class="preview-list w-100">
                                <div class="preview-item p-0">
                                    <div class="preview-thumbnail">
                                        <img src="/admin/assets/images/faces/face12.jpg" class="rounded-circle" alt="">
                                    </div>
                                    <div class="preview-item-content d-flex flex-grow">
                                        <div class="flex-grow">
                                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                <h6 class="preview-subject">CeeCee Bass</h6>
                                                <p class="text-muted text-small">4 Hours Ago</p>
                                            </div>
                                            <p class="text-muted">Well, it seems to be working now.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted">Well, it seems to be working now. </p>
                        <div class="progress progress-md portfolio-progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">To do list</h4>
                        <div class="add-items d-flex">
                            <input type="text" class="form-control todo-list-input" placeholder="enter task..">
                            <button class="add btn btn-primary todo-list-add-btn">Add</button>
                        </div>
                        <div class="list-wrapper">
                            <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                                <li>
                                    <div class="form-check form-check-primary">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox"> Create invoice </label>
                                    </div>
                                    <i class="remove mdi mdi-close-box"></i>
                                </li>
                                <li>
                                    <div class="form-check form-check-primary">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox"> Meeting with Alita </label>
                                    </div>
                                    <i class="remove mdi mdi-close-box"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check form-check-primary">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
                                    </div>
                                    <i class="remove mdi mdi-close-box"></i>
                                </li>
                                <li>
                                    <div class="form-check form-check-primary">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox"> Plan weekend outing </label>
                                    </div>
                                    <i class="remove mdi mdi-close-box"></i>
                                </li>
                                <li>
                                    <div class="form-check form-check-primary">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox"> Pick up kids from school </label>
                                    </div>
                                    <i class="remove mdi mdi-close-box"></i>
                                </li>
                            </ul>
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