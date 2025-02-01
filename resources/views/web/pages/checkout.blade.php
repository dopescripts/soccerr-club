<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Soccerr Club</title>
    <!-- Bs5 cdn link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- Custom css link -->
    <link rel="stylesheet" href="/assets/css/style.css" />
    <!-- Bs5 icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Jquery link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Swiper bundle link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="w-100">
    <!-- Navbar start -->
    <div class="bg-white border-bottom py-3 shadow-none">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand fw-semibold fs-4" href="/">Soccer Club Shop</a>
            <ul class="navbar-nav">
                <li>
                    <a href="#" class="nav-link-off fw-semibold"><i class="bi bi-bag fs-4"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <main class="w-100 h-100 overflow-hidden">
        <section class="w-100 h-100">
            <div class="row w-100 bg-secondary-subtle justify-content-center mx-auto align-items-start h-100">
                <div class="col-md-6 h-100 bg-white overflow-auto">
                    <div class="container my-5">
                        <main>
                            <div class="row g-5">
                                <div class="col-md-12 col-lg-11">
                                    <h4 class="mb-3">Finalize Details</h4>
                                    <form class="needs-validation" action="{{ route('place.order') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $cart->id }}" name="cart_id">

                                        <div class="row g-3">
                                            <div class="col-sm-12">
                                                <label for="firstName" class="form-label">Full name</label>
                                                <input type="text" value="{{ $cart->user->name }}" class="form-control shadow-none outline-none" id="firstName" placeholder="" value="" disabled required>
                                            </div>
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control shadow-none outline-none" id="email" value="{{ $cart->user->email }}" readonly disabled placeholder="you@example.com">
                                                <div class="invalid-feedback">
                                                    Please enter a valid email address for shipping updates.
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control shadow-none outline-none" id="address" placeholder="1234 Main St" required="">
                                                <div class="invalid-feedback">
                                                    Please enter your shipping address.
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                                                <input type="text" class="form-control shadow-none outline-none" id="address2" placeholder="Apartment or suite">
                                            </div>

                                            <div class="col-md-5">
                                                <label for="country" class="form-label">Country</label>
                                                <select class="form-select" id="country" required="">
                                                    <option value="">Choose...</option>
                                                    <option>United States</option>
                                                    <option>Pakistan</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid country.
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="state" class="form-label">State</label>
                                                <select class="form-select" id="state" required="">
                                                    <option value="">Choose...</option>
                                                    <option>California</option>
                                                    <option>New York</option>
                                                    <option>Concordia</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="zip" class="form-label">Zip</label>
                                                <input type="text" class="form-control shadow-none outline-none" id="zip" placeholder="" required="" autocomplete="postal-code">
                                                <div class="invalid-feedback">
                                                    Zip code required.
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="same-address">
                                            <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="save-info">
                                            <label class="form-check-label" for="save-info">Save this information for next time</label>
                                        </div>

                                        <hr class="my-4">
                                        <button class="w-100 btn btn-dark btn-lg" type="submit">Place Order</button>
                                    </form>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
                <div class="col-md-6 h-100 border-start border-dark-subtle">
                    <div class="position-relative">
                        @foreach ($cart->cartItems as $cartitem)
                            <div class="ms-2 d-flex align-items-center my-3">
                                <div class="d-sm-flex gap-3 justify-content-between align-items-center w-100">
                                    <div class="d-md-flex align-items-center gap-3">
                                        <div class="col-sm-5 col-md-4 col-lg-2 position-relative p-2">
                                            <img src="{{ asset('storage/uploads/products' . '/' . $cartitem->product->thumb) }}" alt="" class="img-fluid rounded border border-dark-subtle p-2 bg-white" />
                                            <span class="badge text-bg-danger position-absolute rounded-circle" style="top: -4px; right: -4px;">{{ $cartitem->quantity }}</span>
                                        </div>
                                        <p class="my-0">{{ $cartitem->product->name }}</p>
                                    </div>
                                    <div>
                                        <span class="fw-semibold">{{ "$" . $cartitem->sub_total }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="container-fluid py-3 col-10 justify-content-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="fw-semibold m-0">Subtotal</p>
                                <p class="fw-semibold m-0">${{ number_format($cart->sub_total, 2) }}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="fw-semibold m-0">Shipping</p>
                                <p class="fw-semibold m-0">${{ number_format($cart->shipping, 2) }}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center fs-5">
                                <p class="fw-bold m-0">Total</p>
                                <p class="fw-bold m-0">${{ number_format($cart->total, 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
