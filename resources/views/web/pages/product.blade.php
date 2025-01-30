@extends('web.layout.app')
@section('title', 'Product')
@section('content')
    <!-- Hero Section -->
    <style>
        .star-rating {
            direction: rtl;
            display: inline-block;
            cursor: pointer;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            color: #ddd;
            font-size: 24px;
            padding: 0 2px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .star-rating label:hover,
        .star-rating label:hover~label,
        .star-rating input:checked~label {
            color: #ffc107;
        }
    </style>
    <section class="product-hero product-detail-hero text-center text-white w-100">
        <div class="d-flex h-100 align-items-center flex-column justify-content-center">
            <h1 class="text-white fw-bolder text-capitalize">{{ $product->name }}</h1>
            <p>Home/product/{{ $product->slug }}</p>
        </div>
    </section>
    <!-- Product section start  -->
    <section class="product-detail py-5">
        <div class="container-fluid px-lg-2 px-md-5">
            <div class="row justify-content-center align-items-start g-4">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 py-lg-3">
                    <div class="product-detail-img py-5 position-relative text-center mx-auto">
                        @php
                            $images = json_decode($product->images, true);
                        @endphp
                        <div>
                            <div id="carouselExampleIndicators" class="carousel slide">
                                <div class="carousel-inner p-2">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('storage/' . $images[0]) }}" class="img-fluid" alt="{{ $product->name }} pic">
                                    </div>
                                    @for ($i = 1; $i < count($images); $i++)
                                        <div class="carousel-item">
                                            <img src="{{ asset('storage/' . $images[$i]) }}" class="img-fluid" alt="{{ $product->name }} pic">
                                        </div>
                                    @endfor
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon btn btn-dark" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon btn btn-dark" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <div class="d-flex my-4 thumbnail gap-3 col-md-10 justify-content-center mx-auto">
                                @for ($i = 0; $i < count($images); $i++)
                                    <button class="border-0 outline-none shadow" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}">
                                        <img src="{{ asset('storage/' . $images[$i]) }}" alt="" class="img-fluid rounded-3 thumb">
                                    </button class="border-0 outline-none shadow" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}">
                                @endfor
                            </div>
                        </div>

                        {{-- <img loading="lazy" src="{{ asset( 'storage/' . $images[0]) }}" alt="" class="w-100" /> --}}
                        <a href="#" class="btn btn-light position-absolute top-0 end-0 rounded-circle p-1 fs-6">
                            <i class="bi bi-arrows-fullscreen small fs-6"></i>
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body card-bg border py-4 rounded-4 px-4">
                            <h3 class="product-title fw-bolder text-black">{{ $product->name }}</h3>
                            <span class="small mark"> 🔥 14 Sold in last 24 hours! </span>
                            <div class="d-md-flex justify-content-between align-items-center my-3">
                                <div class="price d-flex align-items-center gap-2">
                                    <div>
                                        <span class="new-price text-dark fs-5 fw-semibold">${{ number_format($product->price - $product->price * $product->discount_percentage, 2) }}</span>
                                        <span class="old-price text-secondary small fw-semibold text-decoration-line-through">${{ $product->price }}</span>
                                    </div>
                                    <span class="badge rounded-0 bg-black fw-normal">-{{ $product->discount_percentage * 100 }}%</span>
                                </div>
                                <div class="action d-flex align-items-center gap-3">
                                    @if (!isProductInWishlist($product->id))
                                        <a href="{{ route('wishlist.add', $product->slug) }}" class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover link-offset-1-hover text-black"><i class="bi bi-heart"></i> Add to Wishlist</a>
                                    @else
                                        <a href="{{ route('wishlist.remove', $product->slug) }}" class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover link-offset-1-hover text-black"><i class="bi bi-heart"></i> Remove from Wishlist</a>
                                    @endif
                                </div>
                            </div>
                            <div class="product-desc">
                                <div>
                                    {!! Str::limit($product->description, 198) !!}
                                </div>
                            </div>
                            <p class="my-2">
                                Quantity:
                                @if ($product->quantity > 0)
                                    <span class="badge bg-success fw-normal fs-6">In Stock</span>
                                    <!-- In Stock -->
                                @else
                                    <span class="badge bg-danger fw-normal fs-6">Out Of Stock</span>
                                    <!-- Out Of Stock -->
                                @endif
                            </p>
                            <div class="col-lg-5 col-md-5 col-sm-6 col-8 my-3 mt-1 mx-auto mx-lg-0">
                                @if (!isProductinCart($product->id))
                                    <form action="{{ route('cart.add', $product->slug) }}" method="get">
                                        <div class="input-group w-100 border">
                                            <button type="button" class="btn btn-light rounded-0" onclick="minusCart()"><i class="bi bi-dash fs-4"></i>
                                            </button>
                                            <input type="text" name="quantity" class="form-control shadow-none outline-none border-0 bg-light" value="1" id="cartquant" max="{{ $product->quantity - 1 }}" aria-valuemax="{{ $product->quantity - 1 }}" readonly required />
                                            <button type="button" class="btn btn-light rounded-0" onclick="addCart()">
                                                <i class="bi bi-plus fs-4"></i>
                                            </button>
                                        </div>
                            </div>
                            <div class="my-2"><i class="bi bi-eye bg-secondary text-light px-3 py-2 rounded-pill"></i> {{ rand(1, 100) }} people are viewing this right now</div>
                            <div class="d-flex flex-column flex-lg-row gap-2 align-items-center my-3">
                                <button type="submit" class="btn btn-secondary shadow-sm flex-grow-1 flex-lg-0"><i class="bi bi-cart"></i> Add to Cart</button>
                                </form>
                            @else
                                <form action="{{ route('cart.remove', $product->slug) }}" method="get">
                            </div>
                            <div class="my-2"><i class="bi bi-eye bg-secondary text-light px-3 py-2 rounded-pill"></i> {{ rand(1, 100) }} people are viewing this right now</div>
                            <div class="d-flex flex-column flex-lg-row gap-2 align-items-center my-3">
                                <button type="submit" class="btn btn-danger shadow-sm flex-grow-1 flex-lg-0"><i class="bi bi-cart"></i> Remove from Cart</button>
                                </form>
                                @endif

                                <button type="button" class="btn btn-dark flex-grow-1">Buy it Now</button>
                            </div>
                            <script>
                                let cartquant = $("#cartquant");
                                /**
                                 * Decrements the value of the cart quantity input if it is greater than 1
                                 */
                                function minusCart() {
                                    if (cartquant.val() > 1) cartquant.val(parseInt(cartquant.val()) - 1);
                                }
                                /**
                                 * Increments the value of the cart quantity input by 1
                                 */
                                function addCart() {
                                    if (cartquant.val() < {{ $product->quantity - 1 }}) {
                                        cartquant.val(parseInt(cartquant.val()) + 1);
                                    }
                                }
                            </script>
                            <div class="d-flex align-items-center justify-content-between px-1">
                                <a href="#" class="link-dark fw-semibold link-underline-opacity-0 link-offset-1 link-underline-opacity-100-hover"><i class="bi bi-shield"></i> Shipping and Returns</a>
                                <a href="{{ route('contact', "ref=$product->slug") }}" class="link-dark fw-semibold link-underline-opacity-0 link-offset-1 link-underline-opacity-100-hover"><i class="bi bi-envelope"></i> Contact Us</a>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-12 col-12">
                                <div class="information d-flex gap-4 my-3">
                                    <label for="" class="fw-semibold">Vendor:</label>
                                    <span class="ms-auto">{{ $product->vendor->name }}</span>
                                </div>
                                <div class="information d-flex gap-4 my-3">
                                    <label for="" class="fw-semibold">Categories:</label>
                                    <span class="ms-auto">{{ $product->category->name }}</span>
                                </div>
                                <div class="information d-flex gap-4 my-3">
                                    <label for="" class="fw-semibold">Tags:</label>
                                    <span class="ms-auto">{{ $product->tags }}</span>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center text-muted fw-semibold">
                                <i class="bi bi-rocket-takeoff pe-2 fs-5"></i> <span>Estimated Delivery: <small class="text-dark fw-bold">31 Dec - 3 Jan</small></span>
                            </div>
                            <div class="d-inline-flex align-items-center text-muted fw-semibold">
                                <i class="bi bi-recycle pe-2 fs-5"></i> <span>Return within <b>30 days</b> of purchase. Taxes
                                    are non-refundable.</span>
                            </div>
                            <div class="ms-lg-auto justify-content-lg-end d-flex align-items-center gap-2 my-2">
                                <a href="#"><i class="bi bi-share pe-2"></i></a>
                                <div class="d-flex gap-2 fs-5">
                                    <i class="fa-brands fa-whatsapp bg-success p-2 rounded-circle text-light"></i>
                                    <i class="fa-brands fa-facebook bg-primary p-2 rounded-circle text-light"></i>
                                    <i class="fa-brands fa-linkedin bg-primary p-2 rounded-circle text-light"></i>
                                    <i class="fa-brands fa-telegram bg-primary-subtle p-2 rounded-circle text-dark"></i>
                                    <i class="fa-brands fa-pinterest bg-danger p-2 rounded-circle text-light"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container py-5 mt-5">
                <ul class="nav nav-pills gap-2" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active shadow-none" id="home-tab" data-bs-toggle="tab" data-bs-target="#description-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link shadow-none" id="profile-tab" data-bs-toggle="tab" data-bs-target="#review-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Reviews <i class="bi bi-star-fill"></i></button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="description-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="my-5">
                            {!! $product->description !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="review-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <div class="my-5">
                            <h3 class="text-black fw-bolder text-center">Customer Reviews</h3>
                            <div class="d-md-flex justify-content-center text-center align-items-center my-5 mx-auto gap-5">
                                <div>
                                    <div class="star-icon">
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <p class="fw-normal text-secondary my-0">Be the first to write review</p>
                                </div>
                                <div class="fs-2 fw-light text-muted mb-3 mb-md-0">|</div>
                                <div>
                                    <button class="btn btn-primary fw-bold rounded-0 shadow-none outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#reviewCollapse" aria-expanded="false" aria-controls="reviewExample">
                                        Write a review
                                    </button>
                                </div>
                            </div>
                            <div class="collapse" id="reviewCollapse">
                                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-12 col-12 justify-content-center mx-auto">
                                    <div class="card card-bg">
                                        <div class="card-body">

                                            @guest
                                                @if (Route::has('login'))
                                                    <p class="text-center">Please <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a> to write a review.</p>
                                                @endif
                                            @else
                                                <h4 class="card-title fw-bold text-center text-black mb-2">Write a review</h4>
                                                <div class="text-center">
                                                    <p class="lead mb-1">RATING</p>
                                                    <form action="" action="POST">
                                                        <input type="hidden" name="product" value="{{ $product->id }}">
                                                        <input type="hidden" name="user" value="{{ Auth::user()->name }}">
                                                        <div class="star-rating animated-stars">
                                                            <input type="radio" id="star5" name="rating" value="5">
                                                            <label for="star5" class="bi bi-star-fill"></label>
                                                            <input type="radio" id="star4" name="rating" value="4">
                                                            <label for="star4" class="bi bi-star-fill"></label>
                                                            <input type="radio" id="star3" name="rating" value="3">
                                                            <label for="star3" class="bi bi-star-fill"></label>
                                                            <input type="radio" id="star2" name="rating" value="2">
                                                            <label for="star2" class="bi bi-star-fill"></label>
                                                            <input type="radio" id="star1" name="rating" value="1">
                                                            <label for="star1" class="bi bi-star-fill"></label>
                                                        </div>
                                                        <p class="lead mb-1">REVIEW</p>
                                                        <div class="col-11 justify-content-center my-3 mx-auto">
                                                            <textarea name="review" id="review" cols="30" rows="6" class="form-control outline-none shadow-none fs-5" placeholder="Write your review here..."></textarea>
                                                        </div>
                                                        <button type="reset" class="btn btn-light mb-3 mx-2">CANCEL</button>
                                                        <button type="submit" class="btn btn-success mb-3">SUBMIT REVIEW</button>
                                                    </form>
                                                </div>
                                            @endguest
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product section ends -->

    <!-- latest products -->
    <section class="latest-products w-100 py-5">
        <div class="container-fluid px-lg-3">
            <div class="heading mb-2">
                <h6 class="mb-0">products</h6>
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1 class="text-black">Latest Products</h1>
                    <a href="#" class="link-danger fw-semibold pe-lg-2 link-offset-1-hover">SEE ALL PRODUCTS</a>
                </div>
            </div>
            <div class="products-swipper">
                <!-- Slider main container -->
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($latest_products as $product)
                            <div class="swiper-slide">
                                <div class="col-12">
                                    <div class="card rounded-4 card-bg">
                                        <div class="card-body">
                                            <div class="product-img d-flex justify-content-center align-items-center rounded position-relative">
                                                <a href="{{ route('product', ['slug' => $product->slug]) }}">
                                                    <img loading="lazy" src="{{ asset('storage/uploads/products' . '/' . $product->thumb) }}" alt="" class="bg-white img-fluid p-2" />
                                                </a>
                                                <div>
                                                    @if ($product->discount_percentage > 0.0 && $product->quantity > 1)
                                                        <span class="badge bg-black position-absolute top-0 start-0 mt-2 ms-2 fw-bold rounded-0">
                                                            -{{ $product->discount_percentage * 100 }}%
                                                        </span>
                                                    @elseif ($product->quantity < 1)
                                                        <span class="badge bg-danger position-absolute top-0 start-0 mt-2 ms-2 fw-bold rounded-0">
                                                            OUT OF STOCK
                                                        </span>
                                                    @endif
                                                    <div class="product-overlay position-absolute mt-2 me-2 end-0 top-0">
                                                        <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
                                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                                @if (isProductInWishlist($product->id))
                                                                    <a href="{{ route('wishlist.remove', $product->slug) }}" class="d-inline-block btn btn-dark" title="Remove from Wishlist"><i class="bi bi-heart-fill"></i>
                                                                    </a>
                                                                @else
                                                                    <a href="{{ route('wishlist.add', $product->slug) }}" class="d-inline-block btn btn-dark" title="Add to Wishlist"><i class="bi bi-heart"></i>
                                                                    </a>
                                                                @endif
                                                            </span>
                                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                                <a href="{{ route('product', $product->slug) }}" class="d-inline-block btn btn-dark" title="Quick View"><i class="bi bi-eye"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-details mt-3 text-center">
                                                <h4 class="card-title" title="{{ $product->name }}">
                                                    <a href="{{ route('product', ['slug' => $product->slug]) }}" class="text-black fw-semibold text-decoration-none text-uppercase">{{ Str::limit($product->name, 32) }}
                                                    </a>
                                                </h4>
                                                <div class="product-desc px-2 text-muted my-2">
                                                    {!! Str::limit($product->description, 60) !!}
                                                </div>
                                                <div class="price">
                                                    <span class="current-price fw-bold lead fw-bold text-black">${{ number_format($product->price - $product->price * $product->discount_percentage, 2) }}</span>
                                                    <p class="previous-price text-decoration-line-through text-muted d-inline-block my-0">
                                                        ${{ $product->price }}</p>
                                                    </p>
                                                </div>
                                                <div>
                                                    <form action="{{ route('cart.add', $product->slug) }}" method="get">
                                                        <button type="submit" class="btn btn-dark" id="addToCart" onclick="addToCart()">
                                                            Add to Cart
                                                            <span class="d-none spinner-border spinner-border-sm" id="loader" aria-hidden="true"></span>
                                                            <span class="visually-hidden" role="status">Loading...</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-prev d-md-none"></div>
                    <div class="swiper-button-next d-md-none"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest products -->

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
                            <input name="email-subscribe" type="text" class="form-control rounded-0 rounded-end-0 border-0 shadow-none py-2 px-3 fs-6" placeholder="Email Address" aria-label="Recipient's username" aria-describedby="button-addon2" required />
                            <button class="btn btn-primary rounded" type="submit" id="button-addon2">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- newsletter  -->
    <script>
        document.querySelectorAll('.star-rating:not(.readonly) label').forEach(star => {
            star.addEventListener('click', function() {
                this.style.transform = 'scale(1.2)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 200);
            });
        });
    </script>
@endsection
