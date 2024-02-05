@php
    $user_name = 'The quick brown fox jumps over the lazy dog';
    $user_name_limit = Str::limit($user_name, 10, '...');

    $count_item = 3;
    $is_login = false;
@endphp

<!-- Navbar start -->
<div class="container-fluid fixed-top">

    {{-- <div class="topbar bg-primary d-none d-lg-block container">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt text-secondary me-2"></i> <a class="text-white"
                        href="#">123 Street, New York</a></small>
                <small class="me-3"><i class="fas fa-envelope text-secondary me-2"></i><a class="text-white"
                        href="#">Email@Example.com</a></small>
            </div>
            <div class="top-link pe-2">
                <a class="text-white" href="#"><small class="mx-2 text-white">Privacy Policy</small>/</a>
                <a class="text-white" href="#"><small class="mx-2 text-white">Terms of Use</small>/</a>
                <a class="text-white" href="#"><small class="ms-2 text-white">Sales and Refunds</small></a>
            </div>
        </div>
    </div> --}}

    <div class="container px-0">
        <nav class="navbar navbar-light navbar-expand-xl bg-white">
            <a class="navbar-brand" href="{{ route('home') }}">
                <h1 class="text-primary display-6">{{ config('app.name') }}</h1>
            </a>
            <button type="button" class="navbar-toggler px-3 py-2" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="navbar-collapse collapse bg-white" id="navbarCollapse">

                <div class="navbar-nav mx-auto">
                    <a class="nav-item nav-link active" href="{{ route('home') }}">Home</a>
                    <a class="nav-item nav-link" href="shop.html">Shop</a>
                    <a class="nav-item nav-link" href="shop-detail.html">Shop Detail</a>

                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Pages</a>
                        <div class="dropdown-menu bg-secondary rounded-0 m-0">
                            <a class="dropdown-item" href="cart.html">Cart</a>
                            <a class="dropdown-item" href="chackout.html">Chackout</a>
                            <a class="dropdown-item" href="testimonial.html">Testimonial</a>
                            <a class="dropdown-item" href="404.html">404 Page</a>
                        </div>
                    </div>
                    <a class="nav-item nav-link" href="contact.html">Contact</a>
                </div>

                <div class="d-flex m-3 me-0">
                    <div class="navbar-nav mx-auto">
                        <a class="position-relative my-auto me-4" href="#"> <i
                                class="fa fa-shopping-bag fa-2x"></i>
                            <span
                                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;">{{ $count_item }}</span>
                        </a>

                        @if ($is_login)
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle my-auto" data-bs-toggle="dropdown"
                                    title="{{ $user_name }}" href="#"><i class="fas fa-user fa-2x"></i>
                                    {{ $user_name_limit }}
                                </a>
                                <div class="dropdown-menu bg-secondary rounded-0 m-0">
                                    <a class="dropdown-item" href="#">Logout</a>
                                </div>
                            </div>
                        @else
                            <a class="my-auto" title="Login" href="#"> <i
                                    class="fas fa-user fa-2x"></i></a>
                        @endif

                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->

<!-- Modal Search Start -->
{{-- <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 d-flex mx-auto">
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
                        <span class="input-group-text p-3" id="search-icon-1"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
<!-- Modal Search End -->
