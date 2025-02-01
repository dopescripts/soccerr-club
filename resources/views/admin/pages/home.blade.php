@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">$12.34</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Potential growth</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">$17.34</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Revenue current</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">$12.34</h3>
                                    <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-danger">
                                    <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Daily Income</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">$31.53</h3>
                                    <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Expense current</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Categories</h4>
                        @php
                            $categories = getCategories();
                        @endphp
                        @foreach ($categories as $category)
                            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                <div class="text-md-center text-xl-left">
                                    <h6 class="mb-1"><a href="{{ route('category.detail', $category->id) }}" target="_blank" class="text-decoration-none">{{ $category->name }}</a></h6>
                                </div>
                                <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                    <h6 class="mb-0 font-weight-normal">{{ $category->products()->count() . ' Items' }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between mb-1">
                            <h4 class="card-title mb-1">Products</h4>
                            <p class="text-muted mb-1">Recently added products</p>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="preview-list">
                                    @foreach ($products as $product)
                                        <div class="preview-item border-bottom">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon">
                                                    <img src="{{ asset('storage/uploads/products/' . $product->thumb) }}" alt="" class="img-fluid rounded">
                                                </div>
                                            </div>
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject">{{ $product->name }}</h6>
                                                    <p class="text-muted mb-0">{{ $product->category->name }}</p>
                                                </div>
                                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                    <p class="text-muted">{{ $product->created_at->diffForHumans() }}</p>
                                                    <!-- diffForHumans() is a Carbon function that formats dates in a human-readable way -->
                                                    <p class="text-muted mb-0">${{ $product->price }}, {{ $product->discount_percentage * 100 }}%</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Order Status</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check form-check-muted m-0">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input">
                                                </label>
                                            </div>
                                        </th>
                                        <th> Client Name </th>
                                        <th> Order No </th>
                                        <th> Product Cost </th>
                                        <th> Placement Date </th>
                                        <th> Payment Status </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-muted m-0">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <img src="assets/images/faces/avatar placeholder.png" alt="image" />
                                                <span class="pl-2">{{ $order->cart->user->name }}</span>
                                            </td>
                                            <td title="{{ $order->order_number, 7 }}"> {{ Str::limit($order->order_number, 7) }} </td>
                                            <td> ${{ $order->cart->getTotalAttribute() }} </td>
                                            <td> {{ Str::limit($order->created_at, 11) }} </td>
                                            <td> {{ 'pending' }} </td>
                                            <td>
                                                @if ($order->status == 'completed')
                                                    <div class="badge badge-outline-success">Completed</div>
                                                @else
                                                    <div class="badge badge-outline-danger">Pending</div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
                                            <input class="checkbox" type="checkbox" checked> Prepare for presentation
                                        </label>
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
