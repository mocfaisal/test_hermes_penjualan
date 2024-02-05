@php

    $user_id = session()->get('user_id');
    $user_fullname = session()->get('user_fullname');
    $user_type = session()->get('user_type');

    $user_name = $user_fullname;
    $user_name_limit = Str::limit($user_name, 10, '...');

    // $count_item_ = session()->get('count_cart_item') ?? 0;
    $count_item_ = App\Models\Table\transaction::getCountCart($user_id);
    $count_item = $count_item_ >= 9 ? '9+' : $count_item_;

    $is_login = !empty($user_id) ? true : false;
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

                </div>

                <div class="d-flex m-3 me-0">
                    <div class="navbar-nav mx-auto">
                        <a class="position-relative my-auto me-4" href="{{ route('cart.index') }}" wire:naviagate> <i
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
                                    <a class="dropdown-item" href="{{ route('report.index') }}" wire:navigate>History Transaction</a>
                                    <a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a>
                                </div>
                            </div>
                        @else
                            <a class="my-auto" title="Login" href="{{ route('frontend.auth.login') }}"> <i
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
