@extends('web.layout.app')
@section('title', 'All Products')
@section('content')
<!-- Hero Section -->
<section class="product-hero text-center text-white w-100">
    <div class="d-flex h-100 align-items-center flex-column justify-content-center">
        <h1 class="text-white fw-bolder text-capitalize">{{ $category->name }}</h1>
        <p>Home /{{ request()->path() }}</p>
    </div>
</section>
<!-- Hero Section ends-->
<!-- Categories section start  -->
<section class="categories-home w-100 py-5" data-aos="fade-up">
    <div class="container-fluid my-md-3">
        <div class="row w-100 gy-5 justify-content-center align-items-center text-center mx-auto mb-5">
            @foreach ($categories->take(6) as $categoryitem)
            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="{{ route('category.detail', $categoryitem->id) }}">
                    <div class="card card-bg">
                        <div class="card-body text-center p-2 rounded-3">
                            <img loading="lazy" src="{{ asset('public/'. $categoryitem->image) }}" alt=""
                                class="img-fluid rounded bg-white p-2" />
                            <div class="card-subtitle mt-3"><a href="product.html"
                                    class="link-dark fw-semibold text-decoration-none text-uppercase">{{
                                    $categoryitem->name }}</a></div>
                            <div class="card-text text-danger">
                                @if($categoryitem->products->count())
                                {{ $categoryitem->products->count() }} items
                                @else
                                <span class="text-danger">No products</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Categories section end  -->
<section class="category-detail w-100 px-1 px-md-4">
    <div class="row justify-content-center gy-5 gx-lg-5 pb-5 w-100 mx-auto">
        <div class="col-lg-3 col-md-4 col-sm-12 col-12 pe-lg-0 mx-auto justify-content-center">
            <div class="card card-bg">
                <div class="card-body py-5">
                    <h5 class="text-black fw-bolder mb-3">Product Categories</h5>
                    @foreach ($categories as $categoryitem)
                    <div class="clearfix py-1 text-black">
                        <a href="{{ route('category.detail', $categoryitem->id) }}" class="link-dark">
                            <div class="float-start">{{ $categoryitem->name }}</div>
                            <div class="float-end">({{ $categoryitem->products->where('is_active', 1)->count() }})</div>
                        </a>
                    </div>
                    @endforeach
                    <hr />
                    <p class="d-inline-flex gap-1 w-100 mb-2">
                        <a class="link-dark w-100 d-flex justify-content-between text-decoration-none fw-semibold"
                            data-bs-toggle="collapse" href="#collapseAvailaible" role="button" aria-expanded="false"
                            aria-controls="collapseExample">Availaibility<i class="bi bi-file-minus"></i> </a>
                    </p>
                    <div class="collapse show" id="collapseAvailaible">
                        <form action="">
                            <label for="instock" class="form-label d-inline-flex gap-2 align-items-center mb-1"><input
                                    type="checkbox" name="instock" id="instock" class="form-check mb-0" /> In Stock
                                (4)</label>
                        </form>
                        <form action="">
                            <label for="outstock" class="form-label d-inline-flex gap-2 align-items-center mb-1"><input
                                    type="checkbox" name="instock" id="outstock" class="form-check mb-0" /> Out of Stock
                                (0)</label>
                        </form>
                    </div>
                    <hr />
                    <p class="d-inline-flex gap-1 w-100 mb-2">
                        <a class="link-dark w-100 d-flex justify-content-between text-decoration-none fw-semibold"
                            data-bs-toggle="collapse" href="#collapsePrice" role="button" aria-expanded="false"
                            aria-controls="collapseExample">Price<i class="bi bi-file-minus"></i>
                        </a>
                    </p>
                    <div class="collapse show" id="collapsePrice">
                        <p>The heighest price is $21.00</p>
                        <input type="range" class="form-range" max="21" min="0" value="0" id="price" step="1"
                            data-bs-theme="dark" />
                    </div>
                    <div class="d-flex">
                        <div class="input-group input-group-sm rounded-0 mb-3 small">
                            <span class="input-group-text rounded-0">$</span>
                            <div class="form-floating">
                                <input type="number" placeholder="From" id="fromdollar"
                                    class="form-control form-control-sm small shadow-none rounded-0"
                                    aria-label="Amount (to the nearest dollar)" value="0" readonly />
                                <label for="fromdollar" class="form-label">From</label>
                            </div>
                        </div>
                        <div class="input-group input-group-sm rounded-0 mb-3 small">
                            <span class="input-group-text rounded-0">$</span>
                            <div class="form-floating">
                                <input type="number" placeholder="From" id="todollar"
                                    class="form-control form-control-sm small shadow-none rounded-0"
                                    aria-label="Amount (to the nearest dollar)" value="21" readonly />
                                <label for="todollar" class="form-label">To</label>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <p class="d-inline-flex gap-1 w-100 mb-2">
                        <a class="link-dark w-100 d-flex justify-content-between text-decoration-none fw-semibold"
                            data-bs-toggle="collapse" href="#feautured" role="button" aria-expanded="false">Featured
                            Products<i class="bi bi-plus"></i> </a>
                    </p>
                    <div class="collapse" id="feautured">...</div>
                    <hr />
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-12 col-12 ps-lg-1 justify-content-center mx-auto">
            <div class="card card-bg mb-3 mx-md-2 py-0">
                <div class="card-body py-1">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="fw-bolder text-black my-0">{{ $category->products->where('is_active', 1)->count() }}
                            Products</p>
                        <div class="d-none d-lg-block">
                            <a href="" class="link-dark"><i class="bi bi-grid-3x3-gap-fill"></i></a>
                            <a href="" class="link-dark"><i class="bi bi-square-fill"></i></a>
                        </div>
                        <div>
                            <select name="sortby" id="sortby" class="form-select form-select-sm shadow-none rounded-0"
                                aria-label="Default select example">
                                <option selected>Sort By</option>
                                <option value="1">Featured</option>
                                <option value="2">Price: Low to High</option>
                                <option value="3">Price: High to Low</option>
                                <option value="4">Alphabatical: A to Z</option>
                                <option value="5">Alphabatical: Z to A</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-row row align-items-center gy-5 justify-content-start w-100 mx-auto">
                @if (count($category->products->where('is_active', '1')) > 0)
                @foreach ($category->products->where('is_active', '1') as $product)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card rounded-4 card-bg">
                        <div class="card-body">
                            <div class="product-img d-flex justify-content-center align-items-center rounded position-relative">
                                <a href="{{ route('product', ['slug' => $product->slug]) }}">
                                    <img loading="lazy" src="{{ asset('storage/uploads/products'. '/' . $product->thumb)}}" alt="" class="bg-white img-fluid p-2" />
                                </a>
                                <div>
                                    <span class="badge bg-black position-absolute top-0 start-0 mt-2 ms-2 fw-bold rounded-0">-{{ $product->discount_percentage*100 }}%</span>
                                    <div class="product-overlay position-absolute mt-2 me-2 end-0 top-0">
                                        <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Add to Wishlist"><i class="bi bi-heart"></i></a>
                                            </span>
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Quick View"><i class="bi bi-eye"></i></a>
                                            </span>
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Compare"><i class="bi bi-stack"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details mt-3 text-center">
                                <h4 class="card-title">
                                    <a href="{{ route('product', ['slug' => $product->slug]) }}" class="text-black fw-semibold text-decoration-none text-uppercase">{{ $product->name }}
                                    </a></h4>
                                <div class="product-desc px-2 text-muted my-2">
                                   {!! $product->description !!}
                                </div>
                                <div class="price">
                                    <span class="current-price fw-bold lead fw-bold text-black">${{ number_format($product->price - $product->price * $product->discount_percentage, 2) }}</span>
                                    <p class="previous-price text-decoration-line-through text-muted d-inline-block my-0">${{ $product->price }}</p>
                                    </p>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-dark" id="addToCart" onclick="addToCart()">
                                        Add to Cart
                                        <span class="d-none spinner-border spinner-border-sm" id="loader" aria-hidden="true"></span>
                                        <span class="visually-hidden" role="status">Loading...</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-10 mx-auto justify-content-center">
                    <div class="card card-bg">
                        <div class="card-body">
                            <h2>No products found</h2>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
</section>
<!-- newsletter  -->
<section class="newsletter w-100 py-5">
    <div class="container-fluid px-lg-2 my-auto">
        <div class="row justify-content-between align-items-center gy-5 py-5 w-100 mx-auto my-auto">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 justify-content-lg-start align-items-center my-auto">
                <div class="newsletter-text text-center text-md-start">
                    <h2 class="fw-bolder text-white text-uppercase mb-3 mb-md-0">Subscribe to our newsletter</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 justify-content-lg-end align-items-center my-auto">
                <div class="newsletter-form col-lg-8 col-md-11 col-sm-12 col-12 ms-auto">
                    <div class="input-group mb-3 bg-dark p-1 border-white" data-bs-theme="dark">
                        <input name="email-subscribe" type="text"
                            class="form-control rounded-0 rounded-end-0 border-0 shadow-none py-2 px-3 fs-6"
                            placeholder="Email Address" aria-label="Recipient's username"
                            aria-describedby="button-addon2" required />
                        <button class="btn btn-primary rounded" type="submit" id="button-addon2">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- newsletter  -->
@endsection