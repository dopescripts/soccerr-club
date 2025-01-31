<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - {{ config('app.name') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Custom css link -->
    <link rel="stylesheet" href="/assets/css/style.css" />
    <!-- Bs5 icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Jquery link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Swiper bundle link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="bg-white overflow-y-auto overflow-x-hidden p-0">
    <!-- Header section  -->
    <header class="w-100">
        <!-- Navbar start -->
        <nav class="navbar d-flex p-0">
            <div class="container-fluid py-3 w-100 align-items-center">
                <button class="navbar-toggler d-flex d-lg-none border-0 p-0 fs-5 outline-none" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                    aria-label="Toggle navigation">
                    <i class="bi bi-list text-white fs-3"></i>
                </button>
                <a class="navbar-brand pb-2 ps-md-3" href="{{ url('/') }}"><img loading="lazy" loading="lazy"
                        src="/assets/images/asset 0.png" alt="" class="img-fluid" width="140" /></a>
                <ul class="mb-2 mb-lg-0 d-flex align-items-center flex-row gap-4 d-none d-lg-flex list-unstyled">
                    @foreach ($navlinks as $navitem)
                    @if (count($navitem->dropdownitems) > 0)
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> {{
                            $navitem->name }} <i class="bi bi-chevron-down"></i> </a>
                        <ul class="dropdown-menu position-absolute rounded-0 p-2 border-0 shadow-sm">
                            <div class="d-flex align-items-center">
                                <div>
                                    <li>
                                        <h5 class="dropdown-header fw-semibold text-black">{{ $navitem->name }}</h5>
                                    </li>
                                    @foreach ($navitem->dropdownitems as $dropdownitem)
                                    <li>
                                        <a class="dropdown-item" href="{{ $dropdownitem->link }}">{{ $dropdownitem->name
                                            }}</a>
                                    </li>
                                    @endforeach
                                </div>
                            </div>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ $navitem->link }}">{{ $navitem->name }}</a>
                    </li>
                    @endif
                    @endforeach
                </ul>
                <div class="d-flex align-items-center gap-3">
                    @guest
                    @if (Route::has('login'))
                    <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"
                        class="nav-link text-decoration-none fw-semibold d-flex align-items-center gap-1"> <i
                            class="bi bi-person fw-bold fs-4"></i> Login
                    </a>
                    <div class="modal fade min-vh-100" id="loginModal">
                        <div class="modal-dialog">
                            <div class="modal-content py-2 px-3">
                                <!-- Modal Header -->
                                <div class="modal-header border-0">
                                    <h5 class="modal-title"></h5>
                                    <button type="button" class="btn-close shadow-none"
                                        data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <ul class="nav nav-underline nav-fill gap-0" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                data-bs-target="#home-tab-pane" type="button" role="tab"
                                                aria-controls="home-tab-pane" aria-selected="true">Login</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                                aria-controls="profile-tab-pane" aria-selected="false">Register</button>
                                        </li>
                                    </ul>
                                    <div class="mt-3 mb-5">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                                aria-labelledby="home-tab" tabindex="0">
                                                <form action="{{ route('login') }}" method="POST" class="mx-1">
                                                    @csrf
                                                    <div class="mb-2">
                                                        <label for="email1" class="form-label fw-semibold">Email
                                                            Address</label>
                                                        <input type="email"
                                                            class="form-control rounded shadow-none py-2 px-3 fs-6 @error('email') is-invalid @enderror"
                                                            name="email" placeholder="Email Address" id="email1"
                                                            required autofocus autocomplete="email" />
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password"
                                                            class="form-label fw-semibold">Password</label>
                                                        <input type="password"
                                                            class="form-control rounded shadow-none py-2 px-3 fs-6 @error('password') is-invalid @enderror"
                                                            placeholder="Password" id="password" name="password"
                                                            required autocomplete="current-password" />
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="remember" id="remember" {{ old('remember')
                                                                ? 'checked' : '' }}>

                                                            <label class="form-check-label" for="remember">
                                                                {{ __('Remember Me') }}
                                                            </label>
                                                        </div>
                                                        @if (Route::has('password.request'))
                                                        <span class="form-text">
                                                            <a href="{{ route('password.request') }}"
                                                                class="link-dark text-decoration-none link-opacity-75-hover">
                                                                Forgot your password?</a>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <button type="submit"
                                                            class="btn btn-dark w-100 shadow-none">Login</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel"
                                                aria-labelledby="profile-tab" tabindex="0">
                                                <form action="" method="POST" class="mx-1">
                                                    <div class="mb-2">
                                                        <label for="fname" class="form-label fw-semibold">Full
                                                            Name</label>
                                                        <input type="text"
                                                            class="form-control rounded shadow-none py-2 px-3 fs-6"
                                                            placeholder="ex: John Doe" id="fname" required />
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="email1" class="form-label fw-semibold">Email
                                                            Address</label>
                                                        <input type="email"
                                                            class="form-control rounded shadow-none py-2 px-3 fs-6"
                                                            placeholder="Email Address" id="email1" required />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password"
                                                            class="form-label fw-semibold">Password</label>
                                                        <input type="password"
                                                            class="form-control rounded shadow-none py-2 px-3 fs-6"
                                                            placeholder="Password" id="password" required />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="cpassword" class="form-label fw-semibold">Confirm
                                                            Password</label>
                                                        <input type="password"
                                                            class="form-control rounded shadow-none py-2 px-3 fs-6"
                                                            placeholder="Password must match above" id="cpassword"
                                                            required />
                                                    </div>
                                                    <div class="mb-3">
                                                        <button type="submit"
                                                            class="btn btn-dark w-100 shadow-none">Register</button>
                                                    </div>
                                                </form>
                                                <div class="text-center" role="presentation">
                                                    Already have an account?
                                                    <a class="link-danger" href="#" data-bs-toggle="modal"
                                                        data-bs-target="signinModal">Login Here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="small d-block text-center">
                                        New user discount applies only to full price items. <br />By providing your
                                        email address, you agree to our <br />
                                        <a href="privacy.html" class="link-danger">Privacy Policy</a> and
                                        <a href="tos.html" class="link-danger">Terms of Service.</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $("#loginModal").appendTo("body");
                    </script>
                    @endif
                    @else
                    <li class="nav-item dropdown list-unstyled">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end p-2 rounded-0" aria-labelledby="navbarDropdown">
                            <p class="ps-2 small fw-normal text-secondary my-0">
                                {{ Auth::user()->email }}
                            </p>
                            <hr class="dropdown-divider" />
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                    @if (!empty(Session::get('error_code')) && Session::get('error_code') == 5)
                    <script>
                        $(function() {
                                $('#loginModal').modal('show');
                            });
                    </script>
                    @endif

                    <a href="#" data-bs-toggle="modal" data-bs-target="#searchModal"
                        class="d-none d-lg-flex link-light text-decoration-none fw-semibold d-flex align-items-center gap-1"><i
                            class="bi bi-search fw-bold fs-4"></i></a>
                    <!-- Search modal  -->
                    <div class="modal fade" id="searchModal">
                        <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-center py-5">
                                    <h4>What are you looking for?</h4>
                                    <div class="col-8 mx-auto">
                                        <div class="input-group">
                                            <input type="text" class="form-control rounded-0 shadow-none py-2 px-3 fs-6"
                                                placeholder="Search for products" aria-label="Search for products"
                                                aria-describedby="basic-addon2" />
                                            <button class="btn btn-primary shadow-none" type="button">Search</button>
                                        </div>
                                        <p class="text-center">Popular searches: Lorem ipsum dolor sit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $("#searchModal").appendTo("body");
                    </script>
                    <!-- Search modal ends -->
                    <a href="#WishlistOffcanvas" data-bs-toggle="offcanvas" role="button"
                        aria-controls="WishlistOffcanvas" aria-labelledby="WishlistOffcanvasLabel"
                        class="nav-link d-none d-lg-flex text-decoration-none fw-semibold align-items-center gap-1"><i
                            class="bi bi-heart fw-bold fs-4"></i>
                    </a>
                    <!-- Wishlist offcanvas -->
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="WishlistOffcanvas"
                        aria-labelledby="WishlistOffcanvasLabel">
                        <div class="offcanvas-header bg-body-tertiary align-items-center">
                            <h5 class="offcanvas-title small my-0" id="WishlistOffcanvasLabel">Wishlist</h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body bg-white min-vh-100">
                            <div class="container my-5">
                                @php
                                $wishlist = getWishlist();
                                @endphp
                                @if ($wishlist != Null && $wishlist->isNotEmpty())

                                @foreach ($wishlist as $item)

                                <div class="product-cart-card p-2">
                                    <div class="row w-100 align-items-center pb-2">
                                        <div class="col-4 ps-3 pe-2">
                                            <a href="{{ route('product' , $item->product->slug) }}">
                                                <img src="{{ asset('storage/uploads/products' . "/" .
                                                    $item->product->thumb) }}"
                                                class="img-fluid rounded" />
                                            </a>
                                        </div>
                                        <div class="col-7 px-0">
                                            <a href="#" class="text-decoration-none fw-semibold link-dark">
                                                <p class="mb-0 fs-5">{{ Str::limit($item->product->name, 36) }}</p>
                                            </a>
                                            <span class="current-price fw-normal text-secondary fs-6 py-2">
                                                ${{ number_format($item->product->price - $item->product->price *
                                                $item->product->discount_percentage, 2) }}
                                            </span>
                                        </div>
                                        <div class="col-1">
                                            <a href="{{ route('wishlist.remove', $item->product->slug) }}"
                                                class="link-dark"><i
                                                    class="fa-solid fa-trash-can text-secondary"></i></a>
                                        </div>
                                    </div>
                                    <hr />
                                </div>

                                @endforeach

                                @else
                                <div class="empty-card text-center">
                                    <img loading="lazy" src="/assets/images/asset 71.svg" alt="" class="img-fluid" />
                                    <h5 class="fw-semibold my-3">Your wishlist is empty!</h5>
                                    <p class="text-muted">No items have been added to your wishlist.</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Wishlist offcanvas end -->
                    @php
                    $cart = getcart();
                    @endphp
                    <a data-bs-toggle="offcanvas" href="#offcanvasCart" role="button" aria-controls="offcanvasExample"
                        class="link-light text-decoration-none fw-semibold d-flex align-items-center gap-1">
                        @if ($cart != Null && $cart->items->isNotEmpty())
                        <span>${{ number_format($cart->total, 2) }}</span>
                        @endif
                        <i class="bi bi-cart fw-bold fs-4"></i> </a>
                    <!-- Cart offcanvas -->
                    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasCart"
                        aria-labelledby="offcanvasCartLabel">
                        <div class="offcanvas-header bg-body-tertiary align-items-center">
                            <h5 class="offcanvas-title small my-0" id="offcanvasCartLabel">Shopping Cart</h5>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body bg-white min-vh-100 p-0">
                            <div class="pt-1 pb-5 h-100">
                                @if ($cart != Null && $cart->items->isNotEmpty())

                                <!-- if not empty cart -->
                                <div class="container-fluid p-0 d-flex flex-column justify-content-between h-100">
                                    <div class="h-100 overflow-y-auto">
                                        <script>
                                            /**
                                             * Decrements the value of the specific cart quantity input if it is greater than 1
                                             */
                                            function minusCart(button) {
                                                let cartquant = $(button).closest(".product-cart-card").find(
                                                    ".cartquant"); // Find the specific input within the same product div
                                                if (cartquant.val() > 1) {
                                                    cartquant.val(parseInt(cartquant.val()) - 1);
                                                }
                                            }

                                            /**
                                             * Increments the value of the specific cart quantity input by 1
                                             */
                                            function addCart(button) {
                                                let cartquant = $(button).closest(".product-cart-card").find(
                                                    ".cartquant"); // Find the specific input within the same product div
                                                cartquant.val(parseInt(cartquant.val()) + 1);
                                            }
                                        </script>
                                        @foreach ($cart->items as $cartitem)
                                        <div class="product-cart-card p-2">
                                            <div class="row w-100 align-items-center pb-2">
                                                <div class="col-4 ps-3 pe-2">
                                                    <a href="{{ route('product' , $cartitem->product->slug) }}">
                                                        <img src="{{ asset('storage/uploads/products' . "/" .
                                                            $cartitem->product->thumb) }}"
                                                        class="img-fluid rounded" />
                                                    </a>
                                                </div>
                                                <div class="col-7 px-0">
                                                    <a href="#" class="text-decoration-none fw-semibold link-dark">
                                                        <p class="mb-0 fs-5">{{ Str::limit($cartitem->product->name, 36)
                                                            }}</p>
                                                    </a>
                                                    <span class="current-price fw-normal text-secondary fs-6 py-2">${{
                                                        number_format($cartitem->product->price -
                                                        $cartitem->product->price *
                                                        $cartitem->product->discount_percentage, 2) }}</span>
                                                    <div class="d-flex align-items-center my-1">
                                                        <button class="btn btn-outline-secondary p-0"
                                                            onclick="minusCart(this)"><i
                                                                class="bi bi-dash fs-6 p-0"></i></button>
                                                        <input type="text"
                                                            class="form-control form-control-sm shadow-none outline-none bg-light py-0 my-0 cartquant"
                                                            value="{{ $cartitem->quantity }}" />
                                                        <button class="btn btn-outline-secondary p-0"
                                                            onclick="addCart(this)"><i
                                                                class="bi bi-plus fs-6 p-0"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <a href="{{ route('cart.remove', $cartitem->product->slug) }}"
                                                        class="link-dark"><i
                                                            class="fa-solid fa-trash-can text-secondary"></i></a>
                                                </div>
                                            </div>
                                            <hr />
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="w-100">
                                        <div class="container-fluid py-2 bg-primary-subtle pb-4 border-top">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="fw-semibold m-0">Subtotal</p>
                                                <p class="fw-semibold m-0">${{ number_format($cart->sub_total, 2) }}</p>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="fw-semibold m-0">Shipping</p>
                                                <p class="fw-semibold m-0">${{ number_format($cart->shipping, 2) }}</p>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="fw-semibold m-0">Total</p>
                                                <p class="fw-semibold m-0">${{ number_format($cart->total, 2) }}</p>
                                            </div>
                                            <div class="d-grid my-2">
                                                <a href="checkout.html" class="btn btn-secondary fw-semibold">View
                                                    Cart</a>
                                            </div>
                                            <div class="d-grid my-2">
                                                <a href="{{ route('checkout', ['order_id' => bin2hex(random_bytes(8))]) }}" class="btn btn-primary fw-semibold">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- if not empty cart -->
                                @else
                                <!-- Empty cart -->
                                <div class="empty-card text-center pt-4">
                                    <img loading="lazy" src="/assets/images/cartempty.svg" alt="" class="img-fluid" />
                                    <h4 class="fw-semibold my-3">Your cart is empty</h4>
                                    <a href="/" class="btn btn-primary fw-semibold">Shop Now</a>
                                </div>
                                <!-- Empty cart ends -->
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Cart offcanvas -->
                    <!-- Modal  -->
                </div>
                <!-- Offcanvas on sm and md screen  -->
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div
                        class="offcanvas-header justify-content-center m-0 bg-warning py-2 text-white align-items-center">
                        <span class="fw-semibold text-uppercase">Close</span>
                        <button type="button" class="m-0 p-0 border-0 bg-transparent text-white fs-4 outline-none"
                            data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                    <div class="offcanvas-body min-vh-100 bg-white">
                        <a href="" class="text-decoration-none">
                            <h6 class="text-black text-center mt-3">What are you looking for?</h6>
                            <form class="d-flex mt-3 text-center px-2" role="search">
                                <input class="form-control shadow-none rounded-pill" type="search" placeholder="Search"
                                    aria-label="Search" />
                                <button class="btn" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </form>
                        </a>
                        <ul class="px-3 list-unstyled mt-4 w-100 pe-5">
                            @foreach ($navlinks as $navitem)
                            <li>
                                <a href="{{ $navitem->link }}"
                                    class="nav-link-off text-decoration-none small border-bottom d-block pb-2">
                                    {{ $navitem->name }}</a>
                            </li>
                            @endforeach
                            <li>
                                <a class="nav-link-off text-decoration-none small border-bottom d-block pb-2 mt-2"
                                    data-bs-toggle="collapse" href="#collapseShop" role="button" aria-expanded="true"
                                    aria-controls="collapseExample"> Shop <i class="bi bi-chevron-down"></i></a>
                            </li>
                            <div class="collapse show" id="collapseShop">
                                <div class="card card-body mt-0 pt-2">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="product.html"
                                                class="nav-link-off text-decoration-none small border-bottom d-block pb-2 mt-2">Products</a>
                                        </li>
                                        <li>
                                            <a href="collection.html"
                                                class="nav-link-off text-decoration-none small border-bottom d-block pb-2 mt-2">Collections</a>
                                        </li>
                                        <li>
                                            <a href="product-detail.html"
                                                class="nav-link-off text-decoration-none small border-bottom d-block pb-2 mt-2">Product
                                                Detail</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
                <!-- Offcanvas on sm and md screen  -->
            </div>
        </nav>
        <!-- Navbar end -->
    </header>
    <!-- Header section end -->
    <main>

        @yield('content')

    </main>
    <!-- footer start  -->
    <footer>
        <div class="container-fluid py-5 card-bg">
            <div class="row w-100 justify-content-center align-items-center mx-auto gy-5 gx-4 pb-2">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 me-auto align-items-center">
                    <img loading="lazy" src="/assets/images/asset 41.png" alt="" class="img-fluid" />
                    <p class="text-secondary mt-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab facilis
                        minus optio omnis ea vitae architecto cupiditate placeat.</p>
                    <div class="social-footer-links">
                        <p class="lead fw-bold text-black">Follow Us</p>
                        <div class="d-flex gap-2 justify-content-start align-items-center">
                            <a href="#" class="footer-link" title="Facebook"><img loading="lazy"
                                    src="/assets/images/asset 63.svg" alt="social links" class="img-fluid" /></a>
                            <a href="#" class="footer-link" title="Facebook"><img loading="lazy"
                                    src="/assets/images/asset 64.svg" alt="social links" class="img-fluid" /></a>
                            <a href="#" class="footer-link" title="Facebook"><img loading="lazy"
                                    src="/assets/images/asset 61.svg" alt="social links" class="img-fluid" /></a>
                            <a href="#" class="footer-link" title="Facebook"><img loading="lazy"
                                    src="/assets/images/asset 62.svg" alt="social links" class="img-fluid" /></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 me-auto align-items-center">
                    <p class="lead fw-bolder text-black text-uppercase">Quick Links</p>
                    <ul class="list-unstyled">
                        <li><a href="#"
                                class="link-dark link-underline-danger link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover fw-normal">Search</a>
                        </li>
                        <li><a href="#"
                                class="link-dark link-underline-danger link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover fw-normal">Privacy
                                Policy</a></li>
                        <li><a href="#"
                                class="link-dark link-underline-danger link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover fw-normal">FAQ's</a>
                        </li>
                        <li><a href="#"
                                class="link-dark link-underline-danger link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover fw-normal">Contact
                                Us</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 me-auto align-items-center">
                    <p class="lead fw-bolder text-black text-uppercase">Information</p>
                    <ul class="list-unstyled">
                        <li><a href="#"
                                class="link-dark link-underline-danger link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover fw-normal">Home
                                Page</a></li>
                        <li><a href="#"
                                class="link-dark link-underline-danger link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover fw-normal">About
                                Us</a></li>
                        <li><a href="#"
                                class="link-dark link-underline-danger link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover fw-normal">Shop</a>
                        </li>
                        <li><a href="#"
                                class="link-dark link-underline-danger link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover fw-normal">Blogs</a>
                        </li>
                        <li><a href="#"
                                class="link-dark link-underline-danger link-underline-opacity-0 link-opacity-100-hover link-underline-opacity-100-hover fw-normal">Team</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 me-auto align-items-center">
                    <p class="lead fw-bolder text-black text-uppercase">Contact Us</p>
                    <div class="d-flex gap-2 align-items-center my-3">
                        <img loading="lazy" src="/assets/images/asset 65.svg" alt="social links" class="img-fluid" />
                        <p class="fs-4 fw-bold text-black m-0">+91 1234567890</p>
                    </div>
                    <div class="d-flex gap-2 align-items-center my-3">
                        <img loading="lazy" src="/assets/images/asset 66.svg" alt="social links" class="img-fluid" />
                        <p class="fw-semibold text-black m-0">mail@gmail.com</p>
                    </div>
                    <div class="d-flex gap-2 align-items-center my-3">
                        <img loading="lazy" src="/assets/images/asset 67.svg" alt="social links" class="img-fluid" />
                        <p class="text-black m-0">Store open at 10:00 am to 8:00 pm</p>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="text-center">
                    <p class="text-secondary pt-2">Copyright © 2023. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->
    <script src="/assets/js/main.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    @if ( session('success') == "Product added to cart" || session('success') == "Product removed from cart" )
    <script>
        $(function() {
        $('#offcanvasCart').offcanvas('show');
    });
    </script>
    @endif
    @if ( session('success') == "Product added to wishlist" || session('success') == "Product removed from wishlist" )
    <script>
        $(function() {
        $('#WishlistOffcanvas').offcanvas('show');
    });
    </script>
    @endif
</body>

</html>