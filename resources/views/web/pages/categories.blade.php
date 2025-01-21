@extends('web.layout.app')
@section('title', 'Categories')
@section('content')
    <!-- Hero Section -->
    <section class="product-hero text-center text-white w-100">
        <div class="d-flex h-100 align-items-center flex-column justify-content-center">
            <h1 class="text-white fw-bolder text-capitalize">{{ Route::currentRouteName() }}</h1>
            <p>Home / {{ Route::currentRouteName() }}</p>
        </div>
    </section>
    <!-- Hero Section ends-->
    <!-- Collection section start  -->
    <section class="collection py-5 w-100">
        <div class="container-fluid mx-lg-2">
          <div class="row justify-content-start align-items-center gy-5 w-100 mx-auto">
            @foreach ($categories as $categoryitem)
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 mx-auto mx-md-0 justify-content-start">
              <div class="card">
                <div class="card-body text-center border rounded border-black">
                  <img loading="lazy" src="{{ asset('public/' . $categoryitem->image) }}" alt="" class="img-fluid p-2" />
                  <a href="{{ route('category.detail', $categoryitem->id) }}" class="link-dark fw-semibold text-decoration-none pt-3">{{ $categoryitem->name }}</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      <!-- Collection section end  -->
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
@endsection
