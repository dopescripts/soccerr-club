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
                                <img src="assets/images/faces/face6.jpg" alt="image" class="rounded-circle" />
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
                                <img src="assets/images/faces/face8.jpg" alt="image" class="rounded-circle" />
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
                                <img src="assets/images/faces/face9.jpg" alt="image" class="rounded-circle" />
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
                                <img src="assets/images/faces/face11.jpg" alt="image" class="rounded-circle" />
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
                            <img src="assets/images/dashboard/Rectangle.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="assets/images/dashboard/Img_5.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="assets/images/dashboard/img_6.jpg" alt="">
                        </div>
                    </div>
                    <div class="d-flex py-4">
                        <div class="preview-list w-100">
                            <div class="preview-item p-0">
                                <div class="preview-thumbnail">
                                    <img src="assets/images/faces/face12.jpg" class="rounded-circle" alt="">
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
@endsection