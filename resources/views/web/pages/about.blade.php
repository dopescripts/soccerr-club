@extends('web.layout.app')
@section('title',  'About Us')
@section('content')
    <!-- Hero Section -->
    <section class="product-hero text-center text-white w-100">
        <div class="d-flex h-100 align-items-center flex-column justify-content-center">
            <h1 class="text-white fw-bolder text-capitalize">{{ Route::currentRouteName() }}</h1>
            <p>Home / {{ Route::currentRouteName() }}</p>
        </div>
    </section>
    <!-- Hero Section ends-->
    <!-- About section start  -->
    <section class="about-us w-100">
        <div class="container-fluid my-5">
          <div class="row w-100 justify-content-center align-items-center mx-auto gy-5">
            <div class="col-md-6 col-sm-12 col-12 mx-auto">
              <div class="row justify-content-center align-items-center w-100 mx-auto gy-4">
                <div class="col-md-4 col-sm-6 col-12 about-img overflow-hidden mx-auto justify-content-center">
                  <div class="overflow-hidden rounded-4 mx-auto w-100">
                    <img loading="lazy" src="https://soccer-club-shop.myshopify.com/cdn/shop/files/about-1.png?v=1730536356&width=1500" alt="" class="img-fluid shadow-sm overflow-hidden w-100" />
                  </div>
                </div>
                <div class="col-md-8 col-sm-6 col-12 about-img overflow-hidden mx-auto">
                  <div class="overflow-hidden rounded-4 mx-auto">
                    <img loading="lazy" src="https://soccer-club-shop.myshopify.com/cdn/shop/files/about.png?v=1730536356&width=1500" alt="" class="img-fluid shadow-sm overflow-hidden" />
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-12 col-12 px-0">
              <h6 class="fw-bolder">About Us</h6>
              <h1 class="fw-bolder">Welcome to Soccer Club</h1>
              <p class="text-secondary fw-normal">
                At Soccer Club, we live and breathe soccer. Our mission is to celebrate the beautiful game and create a community where fans, players, and enthusiasts can come together to share their passion. Whether you're a seasoned player, an aspiring talent, or a dedicated
                fan, our club offers something for everyone.
              </p>
              <h6>Our Story</h6>
              <p class="text-secondary">
                Founded in 2000, Soccer Club was established with the goal of promoting soccer at all levels. What started as a small group of soccer enthusiasts has grown into a vibrant community. We have hosted numerous events, tournaments, and training sessions that have
                helped nurture local talent and brought together soccer lovers from all walks of life.
              </p>
              <h6>our mission</h6>
              <p class="text-secondary">
                Our mission is simple: to foster a love for soccer and provide opportunities for everyone to engage with the sport. We believe in the power of soccer to bring people together, promote healthy lifestyles, and teach important life skills such as teamwork,
                discipline, and perseverance.
              </p>
            </div>
          </div>
        </div>
      </section>
      <!-- About section ends  -->
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
