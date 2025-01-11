@extends('web.layout.app')
@section('title', 'Contact Us')
@section('content')
    <!-- Hero Section -->
    <section class="product-hero text-center text-white w-100">
        <div class="d-flex h-100 align-items-center flex-column justify-content-center">
            <h1 class="text-white fw-bolder text-capitalize">{{ Route::currentRouteName() }}</h1>
            <p>Home / {{ Route::currentRouteName() }}</p>
        </div>
    </section>
    <!-- Hero Section ends-->
    <section class="contact py-5 w-100">
        <div class="container-fluid">
          <!-- Open hours  -->
          <div class="card card-bg">
            <div class="card-body">
              <h4 class="fw-bolder text-dark mb-1">Open Hours</h4>
              <small class="text-secondary fw-semibold">We're Here for You During These Hours.</small>
              <div class="d-flex flex-wrap align-items-center my-3 flex-fill justify-content-center gap-2 gap-md-3 gap-lg-3">
                <div class="bg-white p-3 rounded-3 flex-grow-1 pe-4">
                  <h5 class="fw-bolder fs-6">Monday - Friday</h5>
                  <small class="text-secondary fw-semibold">9:00am - 8:00pm</small>
                </div>
                <div class="bg-white p-3 rounded-3 flex-grow-1 pe-4">
                  <h5 class="fw-bolder fs-6">Saturday</h5>
                  <small class="text-secondary fw-semibold">9:00am - 5:00pm</small>
                </div>
                <div class="bg-white p-3 rounded-3 flex-grow-1 pe-5">
                  <h5 class="fw-bolder fs-6">Sunday</h5>
                  <small class="text-secondary fw-semibold">Closed</small>
                </div>
              </div>
            </div>
          </div>
          <!-- Contact us  -->
          <div class="row mx-auto align-items-start mt-1 gy-5 h-100">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 h-100">
              <div class="card">
                <div class="card-body card-bg rounded-3">
                  <h5 class="fw-bolder text-dark mb-1">Contact Us</h5>
                  <small class="text-secondary fw-semibold">We're here for your help!</small>
                  <div class="d-flex w-100 flex-column gap-3 my-3 justify-content-center align-items-center">
                    <div class="bg-white p-3 rounded-3 w-100">
                      <div class="d-flex justify-content-start gap-4 align-items-center">
                        <i class="bi bi-telephone-fill text-danger"></i>
                        <div>
                          <h6 class="text-dark fw-bolder my-0">
                            Phone Number
                            <p class="small fw-normal my-0">03356019915 (+100) 666-456-7890</p>
                          </h6>
                        </div>
                      </div>
                    </div>
                    <div class="bg-white p-3 rounded-3 w-100">
                      <div class="d-flex justify-content-start gap-3 align-items-center">
                        <i class="bi bi-shop text-danger"></i>
                        <div>
                          <h6 class="text-dark fw-bolder my-0">
                            Shop Address
                            <p class="small fw-normal my-0">Store Location 268 St, South New York/NY 98944, United States.</p>
                          </h6>
                        </div>
                      </div>
                    </div>
                    <div class="bg-white p-3 rounded-3 w-100">
                      <div class="d-flex justify-content-start gap-3 align-items-center">
                        <i class="bi bi-envelope text-danger"></i>
                        <div>
                          <h6 class="text-dark fw-bolder my-0">
                            Email Address
                            <p class="small fw-normal my-0">z7Sxu@example.com</p>
                          </h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 h-100">
              <div class="card">
                <div class="card-body card-bg rounded-3">
                  <h5 class="fw-bolder text-dark mb-1">Get in touch</h5>
                  <small class="text-secondary fw-semibold">We're here for your help!</small>
                  <form action="" class="my-3 row">
                    <div class="col-lg-6 col-12">
                      <div class="mb-3 bg-white border border-dark-subtle overflow-hidden rounded-3 d-flex align-items-center gap-2">
                        <i class="bi bi-person ps-3 fs-5 text-secondary"></i>
                        <div class="form-floating flex-grow-1">
                          <input type="text" class="form-control form-control-sm m-0 rounded-0 border-0 shadow-none outline-none w-100" id="floatingInputName" placeholder="Full Name" />
                          <label for="floatingInputName">Full Name</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="mb-3 bg-white border border-dark-subtle overflow-hidden rounded-3 d-flex align-items-center gap-2">
                        <i class="bi bi-envelope ps-3 fs-5 text-secondary"></i>
                        <div class="form-floating flex-grow-1">
                          <input type="email" class="form-control form-control-sm m-0 rounded-0 border-0 shadow-none outline-none w-100" id="floatingInputEmail" placeholder="Email Address" />
                          <label for="floatingInputEmail">Email Address</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="mb-3 bg-white border border-dark-subtle overflow-hidden rounded-3 d-flex align-items-center gap-2">
                        <i class="bi bi-telephone-fill ps-3 fs-5 text-secondary"></i>
                        <div class="form-floating flex-grow-1">
                          <input type="text" class="form-control form-control-sm m-0 rounded-0 border-0 shadow-none outline-none w-100" id="floatingInputPhone" placeholder="Phone Number" />
                          <label for="floatingInputPhone">Phone Number</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-12">
                      <div class="mb-3 bg-white border border-dark-subtle overflow-hidden rounded-3 d-flex align-items-center gap-2">
                        <i class="bi bi-pencil-square ps-3 fs-5 text-secondary"></i>
                        <div class="form-floating flex-grow-1">
                          <input type="text" class="form-control form-control-sm m-0 rounded-0 border-0 shadow-none outline-none w-100" id="floatingInputSubject" placeholder="Subject" />
                          <label for="floatingInputSubject">Subject</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="mb-3 bg-white pt-2 border border-dark-subtle overflow-hidden rounded-3 d-flex align-items-start gap-2">
                        <i class="bi bi-pencil-square ps-3 fs-5 text-secondary"></i>
                        <div class="flex-grow-1">
                          <textarea style="height: 60px" class="form-control form-control-sm m-0 rounded-0 border-0 shadow-none outline-none w-100" placeholder="Message" id="floatingTextarea"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 mb-3">
                      <input type="checkbox" class="form-check-input shadow-none outline-none" value="" id="exampleCheck1" />
                      <label for="exampleCheck1" class="form-check-label small fw-semibold">Save my Name, Email, and Website in this browser.</label>
                    </div>
                    <div>
                      <button class="btn-dark text-white rounded-2 border-0 outline-none px-4 py-2 small" type="submit">Send Message</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="my-5 w-100">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3447.050067266126!2d71.47766177472971!3d30.235648709487727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x393b3350d540ff07%3A0xecf8a4df8bd24560!2sMaxcore%20Technologies!5e0!3m2!1sen!2s!4v1734695025636!5m2!1sen!2s"
              class="w-100 rounded-3 border"
              height="450"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
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
