@extends('web.layout.app')
@section('title', 'Home')
@section('content')
    <!-- Hero Section -->
    <section class="w-100 hero">
        <!-- Carousel start -->
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img loading="lazy" src="/assets/images/asset 4.jpeg" class="d-block" alt="..." />
                    <div class="carousel-caption">
                        <h5 class="text-uppercase fw-bold fs-6 text-white">welcome to our Soccerr club</h5>
                        <div class="display-1 text-uppercase fw-bold transform-animation">
                            Play with passion, <br />
                            Win with <span class="px-2">pride</span>
                        </div>
                        <div class="my-lg-5 my-2">
                            <button class="btn btn-primary mb-2 mb-md-0">SHOP NOW <i class="bi bi-arrow-right"></i></button>
                            <button class="btn btn-secondary mb-2 mb-md-0">SEE COLLECTION</button>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img loading="lazy" src="/assets/images/asset 4.jpeg" class="d-block" alt="..." />
                    <div class="carousel-caption">
                        <h5 class="text-uppercase fw-bold fs-6 text-white">welcome to our Soccerr club</h5>
                        <div class="display-1 text-uppercase fw-bold transform-animation">
                            Play with <span class="px-2">passion,</span> <br />
                            Win with pride
                        </div>
                        <div class="my-lg-5 my-2">
                            <button class="btn btn-primary mb-2 mb-md-0">SHOP NOW <i class="bi bi-arrow-right"></i></button>
                            <button class="btn btn-secondary mb-2 mb-md-0">SEE COLLECTION</button>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev ms-1" style="width: 30px !important" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon rounded-circle bg-dark text-dark" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next me-1" style="width: 30px !important" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon rounded-circle bg-dark text-dark" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Carousel end -->
    </section>
    <!-- Hero section end -->

    <!-- Categories section start  -->
    <section class="categories-home w-100 py-5" data-aos="fade-up">
        <div class="container-fluid my-md-3">
            <div class="row w-100 gy-5 justify-content-center align-items-center text-center mx-auto mb-5">
                @foreach ($category as $category)
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <a href="{{ route('category.detail', $category->id) }}">
                    <div class="card card-bg">
                        <div class="card-body text-center p-2 rounded-3">
                            <img loading="lazy" src="{{ asset('public/'. $category->image) }}" alt="" class="img-fluid rounded bg-white p-2" />
                            <div class="card-subtitle mt-3"><a href="product.html" class="link-dark fw-semibold text-decoration-none text-uppercase">{{ $category->name }}</a></div>
                            <div class="card-text text-danger">0 items</div>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="marquee my-md-5">
                <marquee behavior="scroll" direction="" class="pt-md-4" onmouseover="this.stop()" onmouseleave="this.start()">
                    <div class="d-flex">
                        <div class="d-flex gap-3 align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="49" height="49" viewBox="0 0 49 49" fill="red">
                                <path
                                    d="M1.8806 2.4833C1.97321 2.19741 2.19741 1.9733 2.4833 1.8806C7.36896 0.297066 12.6006 0.0710744 17.6121 1.22681C22.7655 2.41516 27.4755 5.02947 31.2331 8.78696C32.0125 9.56635 32.7415 10.3861 33.4186 11.2412C37.4694 9.64022 42.1613 10.5897 45.2665 13.6948C48.439 16.8673 49.3716 21.5932 47.6425 25.7344C47.5221 26.0229 47.2658 26.2323 46.9591 26.2929C46.8987 26.3048 46.8379 26.3106 46.7776 26.3106C46.5314 26.3106 46.2922 26.2136 46.1148 26.0361L42.9483 22.8695C41.7457 21.667 40.1075 20.999 38.4254 20.9931C38.9179 22.7136 39.247 24.4874 39.4062 26.293L43.1925 30.0794C43.3683 30.2553 43.4671 30.4936 43.4671 30.7422C43.4671 30.9908 43.3683 31.2292 43.1925 31.405L42.9065 31.6911L48.3752 41.5709C48.5461 41.8797 48.5291 42.2583 48.3313 42.5505C48.1334 42.8426 47.7882 42.9989 47.438 42.9548L46.3849 42.8222L48.4049 47.1593C48.5711 47.5164 48.4965 47.9393 48.218 48.2179C48.0383 48.3975 47.7983 48.4924 47.5549 48.4924C47.421 48.4924 47.2861 48.4637 47.1594 48.4048L42.8223 46.3848L42.9549 47.4379C42.999 47.788 42.8427 48.1332 42.5506 48.3311C42.2583 48.5289 41.8797 48.5458 41.571 48.375L31.6912 42.9062L31.405 43.1923C31.2293 43.3681 30.9908 43.4669 30.7422 43.4669C30.4936 43.4669 30.2552 43.3681 30.0794 43.1923L26.2931 39.406C24.4865 39.2467 22.7116 38.9173 20.9902 38.4244C20.988 40.1165 21.648 41.7264 22.8696 42.9481L26.0362 46.1146C26.2573 46.3356 26.3536 46.6522 26.2931 46.959C26.2325 47.2656 26.0231 47.522 25.7346 47.6423C24.3528 48.2193 22.9066 48.4997 21.474 48.4997C18.6131 48.4997 15.8089 47.3802 13.695 45.2663C10.5876 42.1587 9.63984 37.4702 11.2414 33.4185C10.3863 32.7415 9.56654 32.0124 8.78715 31.233C5.02966 27.4754 2.41534 22.7654 1.22699 17.612C0.0710754 12.6004 0.297157 7.36896 1.8806 2.4833ZM44.2738 21.5439L46.3649 23.6351C47.1118 20.5661 46.2273 17.3069 43.9409 15.0205C41.4829 12.5624 37.8267 11.7314 34.577 12.8128C35.9253 14.7806 37.015 16.906 37.8249 19.1392C40.2056 18.9728 42.5756 19.8458 44.2738 21.5439ZM38.8538 28.392L35.7438 31.502L38.094 33.8522L41.204 30.7422L38.8538 28.392ZM31.6947 30.104C31.4755 29.8846 31.1874 29.775 30.8994 29.775C30.6114 29.775 30.3233 29.8846 30.1041 30.104C29.8916 30.3165 29.7746 30.5989 29.7746 30.8993C29.7746 31.1997 29.8916 31.4822 30.1041 31.6945L36.6839 38.2743C37.1225 38.713 37.836 38.713 38.2746 38.2743C38.487 38.0619 38.604 37.7795 38.604 37.4791C38.604 37.1787 38.487 36.8962 38.2745 36.6838L31.6947 30.104ZM40.8644 45.8414L40.7504 44.9363C40.7078 44.5978 40.8524 44.2629 41.1281 44.0618C41.4035 43.8609 41.7668 43.8255 42.0761 43.9695L45.6199 45.6199L43.9695 42.0761C43.8254 41.7668 43.8609 41.4037 44.0618 41.1281C44.2629 40.8526 44.5971 40.7076 44.9363 40.7504L45.8414 40.8645L41.5272 33.0705L39.4198 35.1779L39.6002 35.3583C40.1667 35.9249 40.4787 36.6781 40.4787 37.4793C40.4787 38.2805 40.1666 39.0337 39.6002 39.6002C39.0154 40.1849 38.2473 40.4773 37.4793 40.4773C36.7112 40.4773 35.9431 40.1849 35.3583 39.6002L35.1779 39.4198L33.0705 41.5273L40.8644 45.8414ZM30.7421 41.2041L33.8521 38.094L31.5019 35.7438L28.3919 38.8539L30.7421 41.2041ZM15.0204 43.9409C17.3069 46.2274 20.5661 47.1115 23.635 46.3649L21.5438 44.2738C19.8474 42.5773 18.973 40.2052 19.1391 37.8248C16.9059 37.0149 14.7803 35.9251 12.8123 34.5767C11.7304 37.8269 12.5604 41.4808 15.0204 43.9409ZM10.1126 29.9075C14.6445 34.4396 20.632 37.1542 27.0122 37.5824L30.1763 34.4182L28.7784 33.0203C28.2119 32.4538 27.8998 31.7006 27.8998 30.8994C27.8998 30.0982 28.2118 29.345 28.7783 28.7784C29.9478 27.609 31.8506 27.6089 33.0202 28.7784L34.4182 30.1763L37.5822 27.0123C37.1542 20.6322 34.4395 14.6446 29.9074 10.1125C22.9634 3.16868 12.893 0.664406 3.51971 3.5198C0.664688 12.8931 3.16859 22.9636 10.1126 29.9075Z">
                                </path>
                                <path
                                    d="M26.4256 10.5867C28.541 12.7021 29.7061 15.5149 29.7061 18.5066C29.7061 21.4983 28.541 24.3109 26.4256 26.4264C24.3101 28.5418 21.4974 29.707 18.5057 29.707C15.514 29.707 12.7012 28.5418 10.5858 26.4264C6.21882 22.0593 6.21882 14.9538 10.5858 10.5867C14.9528 6.21981 22.0584 6.21981 26.4256 10.5867ZM11.9113 25.1008C13.6728 26.8622 16.0146 27.8324 18.5057 27.8324C20.9967 27.8324 23.3386 26.8622 25.1 25.1008C26.8614 23.3395 27.8314 20.9976 27.8314 18.5066C27.8314 16.0155 26.8613 13.6737 25.1 11.9122C23.2818 10.094 20.8941 9.18516 18.5057 9.18516C16.1178 9.18516 13.7292 10.0944 11.9113 11.9122C8.27524 15.5483 8.27524 21.4648 11.9113 25.1008Z">
                                </path>
                                <path
                                    d="M13.1337 14.3559L12.6465 13.8687C12.2805 13.5026 12.2805 12.9091 12.6465 12.543C13.0126 12.1771 13.606 12.1771 13.9722 12.543L14.5074 13.0782C14.5898 13.0278 14.6742 12.9781 14.763 12.9305C15.8788 12.3315 17.2522 12.4237 18.3473 13.1716C19.3491 13.8556 19.8914 14.9418 19.7627 16.0062C19.6983 16.5387 19.5453 17.1208 19.2723 17.8431L22.5923 21.163C22.9527 20.7207 23.1151 20.329 23.2719 19.5787C23.3777 19.072 23.8745 18.7468 24.3812 18.853C24.8879 18.959 25.2129 19.4557 25.1069 19.9623C24.856 21.1627 24.5065 21.8206 23.9225 22.4933L24.4681 23.0389C24.8342 23.4049 24.8342 23.9984 24.4681 24.3646C24.2851 24.5475 24.0452 24.6391 23.8054 24.6391C23.5655 24.6391 23.3256 24.5475 23.1426 24.3646L22.5364 23.7584C21.8538 24.1864 21.1082 24.375 20.3837 24.3749C19.4813 24.3749 18.6122 24.0842 17.9404 23.6057C16.3901 22.5016 15.9301 20.6542 16.7683 18.8993C16.865 18.697 16.9624 18.4894 17.0578 18.2798L14.493 15.715C14.249 16.1704 14.2191 16.5424 14.2171 16.5708C14.1984 17.0721 13.7873 17.4691 13.2815 17.4691C12.7638 17.4691 12.3449 17.0225 12.3449 16.5048C12.3449 16.4912 12.3443 16.5183 12.3449 16.5048C12.3472 16.4413 12.4009 15.3988 13.1337 14.3559ZM19.0276 22.0786C19.5768 22.4696 20.3846 22.6566 21.146 22.3681L18.4677 19.6899C18.4649 19.6957 18.4624 19.7012 18.4596 19.7071C17.809 21.0691 18.7298 21.8666 19.0276 22.0786ZM17.7864 16.3573C17.8396 16.1549 17.8797 15.9613 17.9016 15.7812C17.9452 15.42 17.7052 15.0032 17.29 14.7198C16.9439 14.4833 16.4217 14.3177 15.9055 14.4764L17.7864 16.3573Z">
                                </path>
                            </svg>
                            <h1 class="text-uppercase -0">flash sale</h1>
                            <h1 class="text-muted -0">SAVE UP TO 20%</h1>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="49" height="49" viewBox="0 0 49 49" fill="red">
                                <path
                                    d="M1.8806 2.4833C1.97321 2.19741 2.19741 1.9733 2.4833 1.8806C7.36896 0.297066 12.6006 0.0710744 17.6121 1.22681C22.7655 2.41516 27.4755 5.02947 31.2331 8.78696C32.0125 9.56635 32.7415 10.3861 33.4186 11.2412C37.4694 9.64022 42.1613 10.5897 45.2665 13.6948C48.439 16.8673 49.3716 21.5932 47.6425 25.7344C47.5221 26.0229 47.2658 26.2323 46.9591 26.2929C46.8987 26.3048 46.8379 26.3106 46.7776 26.3106C46.5314 26.3106 46.2922 26.2136 46.1148 26.0361L42.9483 22.8695C41.7457 21.667 40.1075 20.999 38.4254 20.9931C38.9179 22.7136 39.247 24.4874 39.4062 26.293L43.1925 30.0794C43.3683 30.2553 43.4671 30.4936 43.4671 30.7422C43.4671 30.9908 43.3683 31.2292 43.1925 31.405L42.9065 31.6911L48.3752 41.5709C48.5461 41.8797 48.5291 42.2583 48.3313 42.5505C48.1334 42.8426 47.7882 42.9989 47.438 42.9548L46.3849 42.8222L48.4049 47.1593C48.5711 47.5164 48.4965 47.9393 48.218 48.2179C48.0383 48.3975 47.7983 48.4924 47.5549 48.4924C47.421 48.4924 47.2861 48.4637 47.1594 48.4048L42.8223 46.3848L42.9549 47.4379C42.999 47.788 42.8427 48.1332 42.5506 48.3311C42.2583 48.5289 41.8797 48.5458 41.571 48.375L31.6912 42.9062L31.405 43.1923C31.2293 43.3681 30.9908 43.4669 30.7422 43.4669C30.4936 43.4669 30.2552 43.3681 30.0794 43.1923L26.2931 39.406C24.4865 39.2467 22.7116 38.9173 20.9902 38.4244C20.988 40.1165 21.648 41.7264 22.8696 42.9481L26.0362 46.1146C26.2573 46.3356 26.3536 46.6522 26.2931 46.959C26.2325 47.2656 26.0231 47.522 25.7346 47.6423C24.3528 48.2193 22.9066 48.4997 21.474 48.4997C18.6131 48.4997 15.8089 47.3802 13.695 45.2663C10.5876 42.1587 9.63984 37.4702 11.2414 33.4185C10.3863 32.7415 9.56654 32.0124 8.78715 31.233C5.02966 27.4754 2.41534 22.7654 1.22699 17.612C0.0710754 12.6004 0.297157 7.36896 1.8806 2.4833ZM44.2738 21.5439L46.3649 23.6351C47.1118 20.5661 46.2273 17.3069 43.9409 15.0205C41.4829 12.5624 37.8267 11.7314 34.577 12.8128C35.9253 14.7806 37.015 16.906 37.8249 19.1392C40.2056 18.9728 42.5756 19.8458 44.2738 21.5439ZM38.8538 28.392L35.7438 31.502L38.094 33.8522L41.204 30.7422L38.8538 28.392ZM31.6947 30.104C31.4755 29.8846 31.1874 29.775 30.8994 29.775C30.6114 29.775 30.3233 29.8846 30.1041 30.104C29.8916 30.3165 29.7746 30.5989 29.7746 30.8993C29.7746 31.1997 29.8916 31.4822 30.1041 31.6945L36.6839 38.2743C37.1225 38.713 37.836 38.713 38.2746 38.2743C38.487 38.0619 38.604 37.7795 38.604 37.4791C38.604 37.1787 38.487 36.8962 38.2745 36.6838L31.6947 30.104ZM40.8644 45.8414L40.7504 44.9363C40.7078 44.5978 40.8524 44.2629 41.1281 44.0618C41.4035 43.8609 41.7668 43.8255 42.0761 43.9695L45.6199 45.6199L43.9695 42.0761C43.8254 41.7668 43.8609 41.4037 44.0618 41.1281C44.2629 40.8526 44.5971 40.7076 44.9363 40.7504L45.8414 40.8645L41.5272 33.0705L39.4198 35.1779L39.6002 35.3583C40.1667 35.9249 40.4787 36.6781 40.4787 37.4793C40.4787 38.2805 40.1666 39.0337 39.6002 39.6002C39.0154 40.1849 38.2473 40.4773 37.4793 40.4773C36.7112 40.4773 35.9431 40.1849 35.3583 39.6002L35.1779 39.4198L33.0705 41.5273L40.8644 45.8414ZM30.7421 41.2041L33.8521 38.094L31.5019 35.7438L28.3919 38.8539L30.7421 41.2041ZM15.0204 43.9409C17.3069 46.2274 20.5661 47.1115 23.635 46.3649L21.5438 44.2738C19.8474 42.5773 18.973 40.2052 19.1391 37.8248C16.9059 37.0149 14.7803 35.9251 12.8123 34.5767C11.7304 37.8269 12.5604 41.4808 15.0204 43.9409ZM10.1126 29.9075C14.6445 34.4396 20.632 37.1542 27.0122 37.5824L30.1763 34.4182L28.7784 33.0203C28.2119 32.4538 27.8998 31.7006 27.8998 30.8994C27.8998 30.0982 28.2118 29.345 28.7783 28.7784C29.9478 27.609 31.8506 27.6089 33.0202 28.7784L34.4182 30.1763L37.5822 27.0123C37.1542 20.6322 34.4395 14.6446 29.9074 10.1125C22.9634 3.16868 12.893 0.664406 3.51971 3.5198C0.664688 12.8931 3.16859 22.9636 10.1126 29.9075Z">
                                </path>
                                <path
                                    d="M26.4256 10.5867C28.541 12.7021 29.7061 15.5149 29.7061 18.5066C29.7061 21.4983 28.541 24.3109 26.4256 26.4264C24.3101 28.5418 21.4974 29.707 18.5057 29.707C15.514 29.707 12.7012 28.5418 10.5858 26.4264C6.21882 22.0593 6.21882 14.9538 10.5858 10.5867C14.9528 6.21981 22.0584 6.21981 26.4256 10.5867ZM11.9113 25.1008C13.6728 26.8622 16.0146 27.8324 18.5057 27.8324C20.9967 27.8324 23.3386 26.8622 25.1 25.1008C26.8614 23.3395 27.8314 20.9976 27.8314 18.5066C27.8314 16.0155 26.8613 13.6737 25.1 11.9122C23.2818 10.094 20.8941 9.18516 18.5057 9.18516C16.1178 9.18516 13.7292 10.0944 11.9113 11.9122C8.27524 15.5483 8.27524 21.4648 11.9113 25.1008Z">
                                </path>
                                <path
                                    d="M13.1337 14.3559L12.6465 13.8687C12.2805 13.5026 12.2805 12.9091 12.6465 12.543C13.0126 12.1771 13.606 12.1771 13.9722 12.543L14.5074 13.0782C14.5898 13.0278 14.6742 12.9781 14.763 12.9305C15.8788 12.3315 17.2522 12.4237 18.3473 13.1716C19.3491 13.8556 19.8914 14.9418 19.7627 16.0062C19.6983 16.5387 19.5453 17.1208 19.2723 17.8431L22.5923 21.163C22.9527 20.7207 23.1151 20.329 23.2719 19.5787C23.3777 19.072 23.8745 18.7468 24.3812 18.853C24.8879 18.959 25.2129 19.4557 25.1069 19.9623C24.856 21.1627 24.5065 21.8206 23.9225 22.4933L24.4681 23.0389C24.8342 23.4049 24.8342 23.9984 24.4681 24.3646C24.2851 24.5475 24.0452 24.6391 23.8054 24.6391C23.5655 24.6391 23.3256 24.5475 23.1426 24.3646L22.5364 23.7584C21.8538 24.1864 21.1082 24.375 20.3837 24.3749C19.4813 24.3749 18.6122 24.0842 17.9404 23.6057C16.3901 22.5016 15.9301 20.6542 16.7683 18.8993C16.865 18.697 16.9624 18.4894 17.0578 18.2798L14.493 15.715C14.249 16.1704 14.2191 16.5424 14.2171 16.5708C14.1984 17.0721 13.7873 17.4691 13.2815 17.4691C12.7638 17.4691 12.3449 17.0225 12.3449 16.5048C12.3449 16.4912 12.3443 16.5183 12.3449 16.5048C12.3472 16.4413 12.4009 15.3988 13.1337 14.3559ZM19.0276 22.0786C19.5768 22.4696 20.3846 22.6566 21.146 22.3681L18.4677 19.6899C18.4649 19.6957 18.4624 19.7012 18.4596 19.7071C17.809 21.0691 18.7298 21.8666 19.0276 22.0786ZM17.7864 16.3573C17.8396 16.1549 17.8797 15.9613 17.9016 15.7812C17.9452 15.42 17.7052 15.0032 17.29 14.7198C16.9439 14.4833 16.4217 14.3177 15.9055 14.4764L17.7864 16.3573Z">
                                </path>
                            </svg>
                            <h1 class="text-uppercase -0">flash sale</h1>
                            <h1 class="text-muted -0">SAVE UP TO 20%</h1>
                        </div>
                    </div>
                </marquee>
            </div>
        </div>
    </section>
    <!-- Categories section end  -->

    <!-- Banners  -->
    <section class="banner w-100 pb-5">
        <div class="container-fluid">
            <div class="row gy-4 justify-content-center mx-lg-1">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12" data-aos="fade-right">
                    <div class="card card-bg">
                        <img loading="lazy" src="/assets/images/asset 11.jpeg" alt="" class="img-fluid" />
                        <div class="card-img-overlay d-flex flex-column align-items-start justify-content-center">
                            <div class="card-subtitle text-white fw-semibold text-uppercase">Be Well Dressed in</div>
                            <div class="card-title text-white fw-bold text-uppercase h3">Ultimate Men's gear</div>
                            <a class="btn btn-dark">SHOP NOW</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12" data-aos="fade-right">
                    <div class="card card-bg">
                        <img loading="lazy" src="/assets/images/asset 12.jpeg" alt="" class="img-fluid" />
                        <div class="card-img-overlay d-flex flex-column align-items-start justify-content-center">
                            <div class="card-subtitle text-white fw-semibold text-uppercase">new arrivals</div>
                            <div class="card-title text-white fw-bold text-uppercase h3">Woman's Shoes</div>
                            <a class="btn btn-dark">SHOP NOW</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12" data-aos="fade-right">
                    <div class="card card-bg">
                        <img loading="lazy" src="/assets/images/asset 13.jpeg" alt="" class="img-fluid" />
                        <div class="card-img-overlay d-flex flex-column align-items-start justify-content-center">
                            <div class="card-subtitle text-white fw-semibold text-uppercase">get rewarded</div>
                            <div class="card-title text-white fw-bold text-uppercase h3">youth soccerr gear</div>
                            <a href="#" class="btn btn-dark">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banners  -->

    <!-- feautured-products -->
    <section class="feautured-producsts w-100">
        <div class="container-fluid px-lg-3">
            <div class="heading mb-2">
                <h6 class="mb-0">products</h6>
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1 class="text-black">Featured Products</h1>
                    <a href="#" class="link-danger fw-semibold pe-lg-2 link-offset-1-hover">SEE ALL PRODUCTS</a>
                </div>
            </div>
            <div class="product-row row w-100 align-items-center gy-5 mx-auto justify-content-center">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card rounded-4 card-bg">
                        <div class="card-body">
                            <div href="#" class="product-img d-flex justify-content-center align-items-center rounded position-relative">
                                <img loading="lazy" src="/assets/images/asset 9.jpeg" alt="" class="bg-white img-fluid" />
                                <div>
                                    <span class="badge bg-black position-absolute top-0 start-0 mt-2 ms-2 fw-bold rounded-0">-50%</span>
                                    <div class="product-overlay position-absolute mt-2 me-2 end-0 top-0">
                                        <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Add to Wishlist"><i class="bi bi-heart"></i> </a>
                                            </span>
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Quick View"><i class="bi bi-eye"></i> </a>
                                            </span>
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Compare"><i class="bi bi-stack"></i> </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details mt-3 text-center">
                                <h4 class="card-title"><a href="#" class="text-black fw-semibold text-decoration-none text-uppercase">football
                                        ball</a></h4>
                                <p class="text-muted px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Sapiente, dolorem!</p>
                                <div class="price">
                                    <span class="current-price fw-bold lead fw-bold text-black">$3.44</span>
                                    <p class="previous-price text-decoration-line-through text-muted d-inline-block">$5.99
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
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card rounded-4 card-bg">
                        <div class="card-body">
                            <div href="#" class="product-img d-flex justify-content-center align-items-center rounded position-relative">
                                <img loading="lazy" src="/assets/images/asset 9.jpeg" alt="" class="bg-white img-fluid" />
                                <div>
                                    <span class="badge bg-black position-absolute top-0 start-0 mt-2 ms-2 fw-bold rounded-0">-50%</span>
                                    <div class="product-overlay position-absolute mt-2 me-2 end-0 top-0">
                                        <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Add to Wishlist"><i class="bi bi-heart"></i> </a>
                                            </span>
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Quick View"><i class="bi bi-eye"></i> </a>
                                            </span>
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Compare"><i class="bi bi-stack"></i> </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details mt-3 text-center">
                                <h4 class="card-title"><a href="#" class="text-black fw-semibold text-decoration-none text-uppercase">football
                                        ball</a></h4>
                                <p class="text-muted px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Sapiente, dolorem!</p>
                                <div class="price">
                                    <span class="current-price fw-bold lead fw-bold text-black">$3.44</span>
                                    <p class="previous-price text-decoration-line-through text-muted d-inline-block">$5.99
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
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card rounded-4 card-bg">
                        <div class="card-body">
                            <div href="#" class="product-img d-flex justify-content-center align-items-center rounded position-relative">
                                <img loading="lazy" src="/assets/images/asset 9.jpeg" alt="" class="bg-white img-fluid" />
                                <div>
                                    <span class="badge bg-black position-absolute top-0 start-0 mt-2 ms-2 fw-bold rounded-0">-50%</span>
                                    <div class="product-overlay position-absolute mt-2 me-2 end-0 top-0">
                                        <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Add to Wishlist"><i class="bi bi-heart"></i> </a>
                                            </span>
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Quick View"><i class="bi bi-eye"></i> </a>
                                            </span>
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Compare"><i class="bi bi-stack"></i> </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details mt-3 text-center">
                                <h4 class="card-title"><a href="#" class="text-black fw-semibold text-decoration-none text-uppercase">football
                                        ball</a></h4>
                                <p class="text-muted px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Sapiente, dolorem!</p>
                                <div class="price">
                                    <span class="current-price fw-bold lead fw-bold text-black">$3.44</span>
                                    <p class="previous-price text-decoration-line-through text-muted d-inline-block">$5.99
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
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card rounded-4 card-bg">
                        <div class="card-body">
                            <div href="#" class="product-img d-flex justify-content-center align-items-center rounded position-relative">
                                <img loading="lazy" src="/assets/images/asset 9.jpeg" alt="" class="bg-white img-fluid" />
                                <div>
                                    <span class="badge bg-black position-absolute top-0 start-0 mt-2 ms-2 fw-bold rounded-0">-50%</span>
                                    <div class="product-overlay position-absolute mt-2 me-2 end-0 top-0">
                                        <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Add to Wishlist"><i class="bi bi-heart"></i> </a>
                                            </span>
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Quick View"><i class="bi bi-eye"></i> </a>
                                            </span>
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Compare"><i class="bi bi-stack"></i> </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details mt-3 text-center">
                                <h4 class="card-title"><a href="#" class="text-black fw-semibold text-decoration-none text-uppercase">football
                                        ball</a></h4>
                                <p class="text-muted px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Sapiente, dolorem!</p>
                                <div class="price">
                                    <span class="current-price fw-bold lead fw-bold text-black">$3.44</span>
                                    <p class="previous-price text-decoration-line-through text-muted d-inline-block">$5.99
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
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card rounded-4 card-bg">
                        <div class="card-body">
                            <div href="#" class="product-img d-flex justify-content-center align-items-center rounded position-relative">
                                <img loading="lazy" src="/assets/images/asset 9.jpeg" alt="" class="bg-white img-fluid" />
                                <div>
                                    <span class="badge bg-black position-absolute top-0 start-0 mt-2 ms-2 fw-bold rounded-0">-50%</span>
                                    <div class="product-overlay position-absolute mt-2 me-2 end-0 top-0">
                                        <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Add to Wishlist"><i class="bi bi-heart"></i> </a>
                                            </span>
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Quick View"><i class="bi bi-eye"></i> </a>
                                            </span>
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Compare"><i class="bi bi-stack"></i> </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details mt-3 text-center">
                                <h4 class="card-title"><a href="#" class="text-black fw-semibold text-decoration-none text-uppercase">football
                                        ball</a></h4>
                                <p class="text-muted px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Sapiente, dolorem!</p>
                                <div class="price">
                                    <span class="current-price fw-bold lead fw-bold text-black">$3.44</span>
                                    <p class="previous-price text-decoration-line-through text-muted d-inline-block">$5.99
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
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card rounded-4 card-bg">
                        <div class="card-body">
                            <div href="#" class="product-img d-flex justify-content-center align-items-center rounded position-relative">
                                <img loading="lazy" src="/assets/images/asset 9.jpeg" alt="" class="bg-white img-fluid" />
                                <div>
                                    <span class="badge bg-black position-absolute top-0 start-0 mt-2 ms-2 fw-bold rounded-0">-50%</span>
                                    <div class="product-overlay position-absolute mt-2 me-2 end-0 top-0">
                                        <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Add to Wishlist"><i class="bi bi-heart"></i> </a>
                                            </span>
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Quick View"><i class="bi bi-eye"></i> </a>
                                            </span>
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Compare"><i class="bi bi-stack"></i> </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details mt-3 text-center">
                                <h4 class="card-title"><a href="#" class="text-black fw-semibold text-decoration-none text-uppercase">football
                                        ball</a></h4>
                                <p class="text-muted px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Sapiente, dolorem!</p>
                                <div class="price">
                                    <span class="current-price fw-bold lead fw-bold text-black">$3.44</span>
                                    <p class="previous-price text-decoration-line-through text-muted d-inline-block">$5.99
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
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card rounded-4 card-bg">
                        <div class="card-body">
                            <div href="#" class="product-img d-flex justify-content-center align-items-center rounded position-relative">
                                <img loading="lazy" src="/assets/images/asset 9.jpeg" alt="" class="bg-white img-fluid" />
                                <div>
                                    <span class="badge bg-black position-absolute top-0 start-0 mt-2 ms-2 fw-bold rounded-0">-50%</span>
                                    <div class="product-overlay position-absolute mt-2 me-2 end-0 top-0">
                                        <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Add to Wishlist"><i class="bi bi-heart"></i> </a>
                                            </span>
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Quick View"><i class="bi bi-eye"></i> </a>
                                            </span>
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Compare"><i class="bi bi-stack"></i> </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details mt-3 text-center">
                                <h4 class="card-title"><a href="#" class="text-black fw-semibold text-decoration-none text-uppercase">football
                                        ball</a></h4>
                                <p class="text-muted px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Sapiente, dolorem!</p>
                                <div class="price">
                                    <span class="current-price fw-bold lead fw-bold text-black">$3.44</span>
                                    <p class="previous-price text-decoration-line-through text-muted d-inline-block">$5.99
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
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card rounded-4 card-bg">
                        <div class="card-body">
                            <div href="#" class="product-img d-flex justify-content-center align-items-center rounded position-relative">
                                <img loading="lazy" src="/assets/images/asset 9.jpeg" alt="" class="bg-white img-fluid" />
                                <div>
                                    <span class="badge bg-black position-absolute top-0 start-0 mt-2 ms-2 fw-bold rounded-0">-50%</span>
                                    <div class="product-overlay position-absolute mt-2 me-2 end-0 top-0">
                                        <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Add to Wishlist"><i class="bi bi-heart"></i> </a>
                                            </span>
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Quick View"><i class="bi bi-eye"></i> </a>
                                            </span>
                                            <span class="d-flex justify-content-center align-items-center flex-column">
                                                <a href="#" class="d-inline-block btn btn-dark" title="Compare"><i class="bi bi-stack"></i> </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details mt-3 text-center">
                                <h4 class="card-title"><a href="#" class="text-black fw-semibold text-decoration-none text-uppercase">football
                                        ball</a></h4>
                                <p class="text-muted px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Sapiente, dolorem!</p>
                                <div class="price">
                                    <span class="current-price fw-bold lead fw-bold text-black">$3.44</span>
                                    <p class="previous-price text-decoration-line-through text-muted d-inline-block">$5.99
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
            </div>
        </div>
    </section>
    <!-- feautured-products end -->

    <!-- services -->
    <section class="services w-100 py-5">
        <div class="container-xxl container-fluid">
            <div class="row justify-content-center gy-5 px-lg-1 gx-3 w-100 mx-auto">
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card rounded-4 card-bg p-3">
                        <div class="card-body">
                            <div class="icon">
                                <img loading="lazy" src="https://soccer-club-shop.myshopify.com/cdn/shop/files/icon-01.png?v=1730104391" alt="" class="bg-danger rounded p-3" />
                            </div>
                            <div class="text-start text-md-center px-md-2 mt-3">
                                <h5 class="fw-bolder text-black">100% Secures Payments</h5>
                                <p class="text-muted">Get free delivery on all orders, with sunglasses arriving at your
                                    doorstep at no extra cost!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card rounded-4 card-bg p-3">
                        <div class="card-body">
                            <div class="icon">
                                <img loading="lazy" src="https://soccer-club-shop.myshopify.com/cdn/shop/files/icon-02.png?v=1730104391" alt="" class="bg-danger rounded p-3" />
                            </div>
                            <div class="text-start text-md-center px-md-2 mt-3">
                                <h5 class="fw-bolder text-black">Customer Support 24/7</h5>
                                <p class="text-muted">Get free delivery on all orders, with sunglasses arriving at your
                                    doorstep at no extra cost!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card rounded-4 card-bg p-3">
                        <div class="card-body">
                            <div class="icon">
                                <img loading="lazy" src="https://soccer-club-shop.myshopify.com/cdn/shop/files/icon-03.png?v=1730104391" alt="" class="bg-danger rounded p-3" />
                            </div>
                            <div class="text-start text-md-center px-md-2 mt-3">
                                <h5 class="fw-bolder text-black">Free Shipping</h5>
                                <p class="text-muted">Get free delivery on all orders, with sunglasses arriving at your
                                    doorstep at no extra cost!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card rounded-4 card-bg p-3">
                        <div class="card-body">
                            <div class="icon">
                                <img loading="lazy" src="https://soccer-club-shop.myshopify.com/cdn/shop/files/icon-04.png?v=1730104391" alt="" class="bg-danger rounded p-3" />
                            </div>
                            <div class="text-start text-md-center px-md-2 mt-3">
                                <h5 class="fw-bolder text-black">Moneyback gurantee</h5>
                                <p class="text-muted">Get free delivery on all orders, with sunglasses arriving at your
                                    doorstep at no extra cost!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- services -->

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
                        <div class="swiper-slide">
                            <div class="col-12">
                                <div class="card rounded-4 card-bg">
                                    <div class="card-body">
                                        <div href="#" class="product-img d-flex justify-content-center align-items-center rounded position-relative">
                                            <img loading="lazy" src="/assets/images/asset 9.jpeg" alt="" class="bg-white img-fluid" />
                                            <div>
                                                <span class="badge bg-black position-absolute top-0 start-0 mt-2 ms-2 fw-bold rounded-0">-50%</span>
                                                <div class="product-overlay position-absolute mt-2 me-2 end-0 top-0">
                                                    <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
                                                        <span class="d-flex justify-content-center align-items-center flex-column">
                                                            <a href="#" class="d-inline-block btn btn-dark" title="Add to Wishlist"><i class="bi bi-heart"></i> </a>
                                                        </span>
                                                        <span class="d-flex justify-content-center align-items-center flex-column">
                                                            <a href="#" class="d-inline-block btn btn-dark" title="Quick View"><i class="bi bi-eye"></i> </a>
                                                        </span>
                                                        <span class="d-flex justify-content-center align-items-center flex-column">
                                                            <a href="#" class="d-inline-block btn btn-dark" title="Compare"><i class="bi bi-stack"></i> </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-details mt-3 text-center">
                                            <h4 class="card-title"><a href="#" class="text-black fw-semibold text-decoration-none text-uppercase">football
                                                    ball</a></h4>
                                            <p class="text-muted px-2">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Sapiente, dolorem!</p>
                                            <div class="price">
                                                <span class="current-price fw-bold lead fw-bold text-black">$3.44</span>
                                                <p class="previous-price text-decoration-line-through text-muted d-inline-block">
                                                    $5.99</p>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-dark">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="col-12">
                                <div class="card rounded-4 card-bg">
                                    <div class="card-body">
                                        <div href="#" class="product-img d-flex justify-content-center align-items-center rounded position-relative">
                                            <img loading="lazy" src="/assets/images/asset 9.jpeg" alt="" class="bg-white img-fluid" />
                                            <div>
                                                <span class="badge bg-black position-absolute top-0 start-0 mt-2 ms-2 fw-bold rounded-0">-50%</span>
                                                <div class="product-overlay position-absolute mt-2 me-2 end-0 top-0">
                                                    <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
                                                        <span class="d-flex justify-content-center align-items-center flex-column">
                                                            <a href="#" class="d-inline-block btn btn-dark" title="Add to Wishlist"><i class="bi bi-heart"></i> </a>
                                                        </span>
                                                        <span class="d-flex justify-content-center align-items-center flex-column">
                                                            <a href="#" class="d-inline-block btn btn-dark" title="Quick View"><i class="bi bi-eye"></i> </a>
                                                        </span>
                                                        <span class="d-flex justify-content-center align-items-center flex-column">
                                                            <a href="#" class="d-inline-block btn btn-dark" title="Compare"><i class="bi bi-stack"></i> </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-details mt-3 text-center">
                                            <h4 class="card-title"><a href="#" class="text-black fw-semibold text-decoration-none text-uppercase">football
                                                    ball</a></h4>
                                            <p class="text-muted px-2">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Sapiente, dolorem!</p>
                                            <div class="price">
                                                <span class="current-price fw-bold lead fw-bold text-black">$3.44</span>
                                                <p class="previous-price text-decoration-line-through text-muted d-inline-block">
                                                    $5.99</p>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-dark">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="col-12">
                                <div class="card rounded-4 card-bg">
                                    <div class="card-body">
                                        <div href="#" class="product-img d-flex justify-content-center align-items-center rounded position-relative">
                                            <img loading="lazy" src="/assets/images/asset 9.jpeg" alt="" class="bg-white img-fluid" />
                                            <div>
                                                <span class="badge bg-black position-absolute top-0 start-0 mt-2 ms-2 fw-bold rounded-0">-50%</span>
                                                <div class="product-overlay position-absolute mt-2 me-2 end-0 top-0">
                                                    <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
                                                        <span class="d-flex justify-content-center align-items-center flex-column">
                                                            <a href="#" class="d-inline-block btn btn-dark" title="Add to Wishlist"><i class="bi bi-heart"></i> </a>
                                                        </span>
                                                        <span class="d-flex justify-content-center align-items-center flex-column">
                                                            <a href="#" class="d-inline-block btn btn-dark" title="Quick View"><i class="bi bi-eye"></i> </a>
                                                        </span>
                                                        <span class="d-flex justify-content-center align-items-center flex-column">
                                                            <a href="#" class="d-inline-block btn btn-dark" title="Compare"><i class="bi bi-stack"></i> </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-details mt-3 text-center">
                                            <h4 class="card-title"><a href="#" class="text-black fw-semibold text-decoration-none text-uppercase">football
                                                    ball</a></h4>
                                            <p class="text-muted px-2">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Sapiente, dolorem!</p>
                                            <div class="price">
                                                <span class="current-price fw-bold lead fw-bold text-black">$3.44</span>
                                                <p class="previous-price text-decoration-line-through text-muted d-inline-block">
                                                    $5.99</p>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-dark">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="col-12">
                                <div class="card rounded-4 card-bg">
                                    <div class="card-body">
                                        <div href="#" class="product-img d-flex justify-content-center align-items-center rounded position-relative">
                                            <img loading="lazy" src="/assets/images/asset 9.jpeg" alt="" class="bg-white img-fluid" />
                                            <div>
                                                <span class="badge bg-black position-absolute top-0 start-0 mt-2 ms-2 fw-bold rounded-0">-50%</span>
                                                <div class="product-overlay position-absolute mt-2 me-2 end-0 top-0">
                                                    <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
                                                        <span class="d-flex justify-content-center align-items-center flex-column">
                                                            <a href="#" class="d-inline-block btn btn-dark" title="Add to Wishlist"><i class="bi bi-heart"></i> </a>
                                                        </span>
                                                        <span class="d-flex justify-content-center align-items-center flex-column">
                                                            <a href="#" class="d-inline-block btn btn-dark" title="Quick View"><i class="bi bi-eye"></i> </a>
                                                        </span>
                                                        <span class="d-flex justify-content-center align-items-center flex-column">
                                                            <a href="#" class="d-inline-block btn btn-dark" title="Compare"><i class="bi bi-stack"></i> </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-details mt-3 text-center">
                                            <h4 class="card-title"><a href="#" class="text-black fw-semibold text-decoration-none text-uppercase">football
                                                    ball</a></h4>
                                            <p class="text-muted px-2">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Sapiente, dolorem!</p>
                                            <div class="price">
                                                <span class="current-price fw-bold lead fw-bold text-black">$3.44</span>
                                                <p class="previous-price text-decoration-line-through text-muted d-inline-block">
                                                    $5.99</p>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-dark">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="col-12">
                                <div class="card rounded-4 card-bg">
                                    <div class="card-body">
                                        <div href="#" class="product-img d-flex justify-content-center align-items-center rounded position-relative">
                                            <img loading="lazy" src="/assets/images/asset 9.jpeg" alt="" class="bg-white img-fluid" />
                                            <div>
                                                <span class="badge bg-black position-absolute top-0 start-0 mt-2 ms-2 fw-bold rounded-0">-50%</span>
                                                <div class="product-overlay position-absolute mt-2 me-2 end-0 top-0">
                                                    <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
                                                        <span class="d-flex justify-content-center align-items-center flex-column">
                                                            <a href="#" class="d-inline-block btn btn-dark" title="Add to Wishlist"><i class="bi bi-heart"></i> </a>
                                                        </span>
                                                        <span class="d-flex justify-content-center align-items-center flex-column">
                                                            <a href="#" class="d-inline-block btn btn-dark" title="Quick View"><i class="bi bi-eye"></i> </a>
                                                        </span>
                                                        <span class="d-flex justify-content-center align-items-center flex-column">
                                                            <a href="#" class="d-inline-block btn btn-dark" title="Compare"><i class="bi bi-stack"></i> </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-details mt-3 text-center">
                                            <h4 class="card-title"><a href="#" class="text-black fw-semibold text-decoration-none text-uppercase">football
                                                    ball</a></h4>
                                            <p class="text-muted px-2">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Sapiente, dolorem!</p>
                                            <div class="price">
                                                <span class="current-price fw-bold lead fw-bold text-black">$3.44</span>
                                                <p class="previous-price text-decoration-line-through text-muted d-inline-block">
                                                    $5.99</p>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-dark">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="col-12">
                                <div class="card rounded-4 card-bg">
                                    <div class="card-body">
                                        <div href="#" class="product-img d-flex justify-content-center align-items-center rounded position-relative">
                                            <img loading="lazy" src="/assets/images/asset 9.jpeg" alt="" class="bg-white img-fluid" />
                                            <div>
                                                <span class="badge bg-black position-absolute top-0 start-0 mt-2 ms-2 fw-bold rounded-0">-50%</span>
                                                <div class="product-overlay position-absolute mt-2 me-2 end-0 top-0">
                                                    <div class="d-flex flex-column gap-1 justify-content-center align-items-center">
                                                        <span class="d-flex justify-content-center align-items-center flex-column">
                                                            <a href="#" class="d-inline-block btn btn-dark" title="Add to Wishlist"><i class="bi bi-heart"></i> </a>
                                                        </span>
                                                        <span class="d-flex justify-content-center align-items-center flex-column">
                                                            <a href="#" class="d-inline-block btn btn-dark" title="Quick View"><i class="bi bi-eye"></i> </a>
                                                        </span>
                                                        <span class="d-flex justify-content-center align-items-center flex-column">
                                                            <a href="#" class="d-inline-block btn btn-dark" title="Compare"><i class="bi bi-stack"></i> </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-details mt-3 text-center">
                                            <h4 class="card-title"><a href="#" class="text-black fw-semibold text-decoration-none text-uppercase">football
                                                    ball</a></h4>
                                            <p class="text-muted px-2">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Sapiente, dolorem!</p>
                                            <div class="price">
                                                <span class="current-price fw-bold lead fw-bold text-black">$3.44</span>
                                                <p class="previous-price text-decoration-line-through text-muted d-inline-block">
                                                    $5.99</p>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-dark">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-prev d-md-none"></div>
                    <div class="swiper-button-next d-md-none"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest products -->

    <!-- team section  -->
    <section class="team w-100 py-5">
        <div class="container-fluid heading mb-2">
            <h6 class="mb-0">team</h6>
            <div class="d-flex justify-content-between align-items-baseline">
                <h1 class="text-black">Meet Our Team</h1>
                <!-- <a href="#" class="link-danger fw-semibold pe-lg-2 link-offset-1-hover">SEE ALL PRODUCTS</a> -->
            </div>
        </div>
        <div class="row w-100 justify-content-center gy-5 align-items-center mx-auto">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-bg">
                    <div class="card-body">
                        <div class="team-img position-relative overflow-hidden">
                            <img loading="lazy" src="/assets/images/asset 18.jpeg" alt="" class="img-fluid object-fit-cover" />
                            <div class="position-absolute top-0 start-0 team-link">
                                <div class="d-flex flex-column gap-2 mt-2 ms-3">
                                    <a href="#" class="footer-link"><img loading="lazy" src="/assets/images/asset 61.svg" alt="" /></a>
                                    <a href="#" class="footer-link"><img loading="lazy" src="/assets/images/asset 62.svg" alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <h4 class="ps-1 fw-bolder text-uppercase my-3">Ava elizabeth</h4>
                        <p class="ps-1 text-muted fw-semibold">Customer Service Lead</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-bg">
                    <div class="card-body">
                        <div class="team-img position-relative overflow-hidden">
                            <img loading="lazy" src="/assets/images/asset 18.jpeg" alt="" class="img-fluid object-fit-cover" />
                            <div class="position-absolute top-0 start-0 team-link">
                                <div class="d-flex flex-column gap-2 mt-2 ms-3">
                                    <a href="#" class="footer-link"><img loading="lazy" src="/assets/images/asset 61.svg" alt="" /></a>
                                    <a href="#" class="footer-link"><img loading="lazy" src="/assets/images/asset 62.svg" alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <h4 class="ps-1 fw-bolder text-uppercase my-3">Ava elizabeth</h4>
                        <p class="ps-1 text-muted fw-semibold">Customer Service Lead</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-bg">
                    <div class="card-body">
                        <div class="team-img position-relative overflow-hidden">
                            <img loading="lazy" src="/assets/images/asset 18.jpeg" alt="" class="img-fluid object-fit-cover" />
                            <div class="position-absolute top-0 start-0 team-link">
                                <div class="d-flex flex-column gap-2 mt-2 ms-3">
                                    <a href="#" class="footer-link"><img loading="lazy" src="/assets/images/asset 61.svg" alt="" /></a>
                                    <a href="#" class="footer-link"><img loading="lazy" src="/assets/images/asset 62.svg" alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <h4 class="ps-1 fw-bolder text-uppercase my-3">Ava elizabeth</h4>
                        <p class="ps-1 text-muted fw-semibold">Customer Service Lead</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-bg">
                    <div class="card-body">
                        <div class="team-img position-relative overflow-hidden">
                            <img loading="lazy" src="/assets/images/asset 18.jpeg" alt="" class="img-fluid object-fit-cover" />
                            <div class="position-absolute top-0 start-0 team-link">
                                <div class="d-flex flex-column gap-2 mt-2 ms-3">
                                    <a href="#" class="footer-link"><img loading="lazy" src="/assets/images/asset 61.svg" alt="" /></a>
                                    <a href="#" class="footer-link"><img loading="lazy" src="/assets/images/asset 62.svg" alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <h4 class="ps-1 fw-bolder text-uppercase my-3">Ava elizabeth</h4>
                        <p class="ps-1 text-muted fw-semibold">Customer Service Lead</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team section  -->

    <!-- testimonial section -->
    <section class="testimonial w-100 py-5">
        <div class="container-fluid heading mb-2">
            <h6 class="mb-0">our testimonials</h6>
            <div class="d-flex justify-content-between align-items-baseline">
                <h1 class="text-black">What People Are Saying</h1>
            </div>
            <div class="testimonial-swipper my-4 w-100">
                <!-- Slider main container -->
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="col-12">
                                <div class="card p-3 py-2 card-bg">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <img loading="lazy" src="/assets/images/asset 23.jpeg" alt="" class="img-fluid rounded" />
                                            <span class="quote-icon"><i class="fa-solid fa-quote-right"></i></span>
                                        </div>
                                        <p class="fw-bolder mb-0 mt-3">Samuel Jackson</p>
                                        <div class="d-flex gap-1 star-icons">
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-half text-danger"></i>
                                        </div>
                                        <p class="rate-text mt-2 text-secondary-emphasis">Lorem ipsum dolor sit amet
                                            consectetur adipisicing elit. Vel iste sit et corrupti quo enim, fugit possimus
                                            totam?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="col-12">
                                <div class="card p-3 py-2 card-bg">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <img loading="lazy" src="/assets/images/asset 23.jpeg" alt="" class="img-fluid rounded" />
                                            <span class="quote-icon"><i class="fa-solid fa-quote-right"></i></span>
                                        </div>
                                        <p class="fw-bolder mb-0 mt-3">Samuel Jackson</p>
                                        <div class="d-flex gap-1 star-icons">
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-half text-danger"></i>
                                        </div>
                                        <p class="rate-text mt-2 text-secondary-emphasis">Lorem ipsum dolor sit amet
                                            consectetur adipisicing elit. Vel iste sit et corrupti quo enim, fugit possimus
                                            totam?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="col-12">
                                <div class="card p-3 py-2 card-bg">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <img loading="lazy" src="/assets/images/asset 23.jpeg" alt="" class="img-fluid rounded" />
                                            <span class="quote-icon"><i class="fa-solid fa-quote-right"></i></span>
                                        </div>
                                        <p class="fw-bolder mb-0 mt-3">Samuel Jackson</p>
                                        <div class="d-flex gap-1 star-icons">
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-half text-danger"></i>
                                        </div>
                                        <p class="rate-text mt-2 text-secondary-emphasis">Lorem ipsum dolor sit amet
                                            consectetur adipisicing elit. Vel iste sit et corrupti quo enim, fugit possimus
                                            totam?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="col-12">
                                <div class="card p-3 py-2 card-bg">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <img loading="lazy" src="/assets/images/asset 23.jpeg" alt="" class="img-fluid rounded" />
                                            <span class="quote-icon"><i class="fa-solid fa-quote-right"></i></span>
                                        </div>
                                        <p class="fw-bolder mb-0 mt-3">Samuel Jackson</p>
                                        <div class="d-flex gap-1 star-icons">
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-half text-danger"></i>
                                        </div>
                                        <p class="rate-text mt-2 text-secondary-emphasis">Lorem ipsum dolor sit amet
                                            consectetur adipisicing elit. Vel iste sit et corrupti quo enim, fugit possimus
                                            totam?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="col-12">
                                <div class="card p-3 py-2 card-bg">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <img loading="lazy" src="/assets/images/asset 23.jpeg" alt="" class="img-fluid rounded" />
                                            <span class="quote-icon"><i class="fa-solid fa-quote-right"></i></span>
                                        </div>
                                        <p class="fw-bolder mb-0 mt-3">Samuel Jackson</p>
                                        <div class="d-flex gap-1 star-icons">
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-half text-danger"></i>
                                        </div>
                                        <p class="rate-text mt-2 text-secondary-emphasis">Lorem ipsum dolor sit amet
                                            consectetur adipisicing elit. Vel iste sit et corrupti quo enim, fugit possimus
                                            totam?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="col-12">
                                <div class="card p-3 py-2 card-bg">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <img loading="lazy" src="/assets/images/asset 23.jpeg" alt="" class="img-fluid rounded" />
                                            <span class="quote-icon"><i class="fa-solid fa-quote-right"></i></span>
                                        </div>
                                        <p class="fw-bolder mb-0 mt-3">Samuel Jackson</p>
                                        <div class="d-flex gap-1 star-icons">
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-half text-danger"></i>
                                        </div>
                                        <p class="rate-text mt-2 text-secondary-emphasis">Lorem ipsum dolor sit amet
                                            consectetur adipisicing elit. Vel iste sit et corrupti quo enim, fugit possimus
                                            totam?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="col-12">
                                <div class="card p-3 py-2 card-bg">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <img loading="lazy" src="/assets/images/asset 23.jpeg" alt="" class="img-fluid rounded" />
                                            <span class="quote-icon"><i class="fa-solid fa-quote-right"></i></span>
                                        </div>
                                        <p class="fw-bolder mb-0 mt-3">Samuel Jackson</p>
                                        <div class="d-flex gap-1 star-icons">
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-fill text-danger"></i>
                                            <i class="bi bi-star-half text-danger"></i>
                                        </div>
                                        <p class="rate-text mt-2 text-secondary-emphasis">Lorem ipsum dolor sit amet
                                            consectetur adipisicing elit. Vel iste sit et corrupti quo enim, fugit possimus
                                            totam?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Repeat other slides as needed -->
                    </div>
                    <!-- If we need pagination -->
                    <div class="text-center pb-3">
                        <div class="swiper-pagination-bullets"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial section end -->

    <!-- Blog section  -->
    <section class="blog w-100 py-5">
        <div class="container-fluid">
            <div class="heading mb-2">
                <h6 class="mb-0">our blogs</h6>
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1 class="text-black">Latest Blogs</h1>
                    <a href="#" class="link-danger fw-semibold pe-lg-2 link-offset-1-hover">SEE ALL BLOGS</a>
                </div>
            </div>
            <div class="row justify-content-center align-items-center mx-auto gy-5 mt-4">
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card card-bg overflow-hidden rounded-4">
                        <div class="position-relative">
                            <img loading="lazy" src="/assets/images/asset 26.jpeg" class="card-img-top p-3 pb-0 rounded overflow-hidden" alt="..." />
                            <span class="position-absolute top-0 start-0 mt-4 fw-bold ms-4 badge bg-danger rounded-0">OCT,
                                19 2024</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="#" class="text-decoration-none link-dark">Breaking
                                    Boundaries: Soccer's Impact on Social Change</a></h5>
                            <p class="card-text text-muted mb-1 py-2">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Vel....</p>
                            <a href="#" class="link-dark fw-semibold text-decoration-none">Read More <i class="fa-solid fa-arrow-right ps-lg-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card card-bg overflow-hidden rounded-4">
                        <div class="position-relative">
                            <img loading="lazy" src="/assets/images/asset 26.jpeg" class="card-img-top p-3 pb-0 rounded overflow-hidden" alt="..." />
                            <span class="position-absolute top-0 start-0 mt-4 fw-bold ms-4 badge bg-danger rounded-0">OCT,
                                19 2024</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="#" class="text-decoration-none link-dark">Breaking
                                    Boundaries: Soccer's Impact on Social Change</a></h5>
                            <p class="card-text text-muted mb-1 py-2">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Vel....</p>
                            <a href="#" class="link-dark fw-semibold text-decoration-none">Read More <i class="fa-solid fa-arrow-right ps-lg-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card card-bg overflow-hidden rounded-4">
                        <div class="position-relative">
                            <img loading="lazy" src="/assets/images/asset 26.jpeg" class="card-img-top p-3 pb-0 rounded overflow-hidden" alt="..." />
                            <span class="position-absolute top-0 start-0 mt-4 fw-bold ms-4 badge bg-danger rounded-0">OCT,
                                19 2024</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="#" class="text-decoration-none link-dark">Breaking
                                    Boundaries: Soccer's Impact on Social Change</a></h5>
                            <p class="card-text text-muted mb-1 py-2">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Vel....</p>
                            <a href="#" class="link-dark fw-semibold text-decoration-none">Read More <i class="fa-solid fa-arrow-right ps-lg-1"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card card-bg overflow-hidden rounded-4">
                        <div class="position-relative">
                            <img loading="lazy" src="/assets/images/asset 26.jpeg" class="card-img-top p-3 pb-0 rounded overflow-hidden" alt="..." />
                            <span class="position-absolute top-0 start-0 mt-4 fw-bold ms-4 badge bg-danger rounded-0">OCT,
                                19 2024</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="#" class="text-decoration-none link-dark">Breaking
                                    Boundaries: Soccer's Impact on Social Change</a></h5>
                            <p class="card-text text-muted mb-1 py-2">Lorem ipsum dolor sit amet consectetur adipisicing
                                elit. Vel....</p>
                            <a href="#" class="link-dark fw-semibold text-decoration-none">Read More <i class="fa-solid fa-arrow-right ps-lg-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog section  -->

    <!-- brands  -->
    <section class="brands w-100 py-5">
        <div class="brands-swiper container-fluid">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img loading="lazy" src="/assets/images/asset 35.png" alt="" class="img-fluid" />
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" src="/assets/images/asset 35.png" alt="" class="img-fluid" />
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" src="/assets/images/asset 35.png" alt="" class="img-fluid" />
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" src="/assets/images/asset 35.png" alt="" class="img-fluid" />
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" src="/assets/images/asset 35.png" alt="" class="img-fluid" />
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" src="/assets/images/asset 35.png" alt="" class="img-fluid" />
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" src="/assets/images/asset 35.png" alt="" class="img-fluid" />
                    </div>
                    <div class="swiper-slide">
                        <img loading="lazy" src="/assets/images/asset 35.png" alt="" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- brands  -->

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
