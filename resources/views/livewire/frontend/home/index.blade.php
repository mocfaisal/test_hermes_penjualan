@php
    $disk = 'public';
    $file_name = '/Logo-SK.png';
    $file_path = 'uploads/images' . $file_name;
    $images = '';

    if (Storage::disk($disk)->exists($file_path)) {
        $url = Storage::disk($disk)->url($file_path);
        $images = asset($url);
    }
@endphp

<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="tab-class text-center">
                <div class="row g-4">
                    <div class="col-lg-4 text-start">
                        <h1>Our Products</h1>
                    </div>
                    <div class="col-lg-8 text-end">
                        <div class="row">
                            <div class="col-11">
                                <ul class="nav nav-pills d-inline-flex mb-5 text-center">
                                    <li class="nav-item">
                                        <a class="d-flex bg-light rounded-pill active m-1 py-1" data-bs-toggle="pill"
                                            href="#tab-1">
                                            <span class="text-dark" style="width: 130px;">All Products</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex bg-light rounded-pill m-1 py-1" data-bs-toggle="pill"
                                            href="#tab-2">
                                            <span class="text-dark" style="width: 130px;">Fabric Care</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-1">
                                <a class="text-primary" href="#">See More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content">

                    <div class="tab-pane fade show active p-0" id="tab-1">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">

                                    @foreach ($list_product as $item)
                                        <div class="col-md-6 col-lg-4 col-xl-3" wire:key="{{ $item->id }}">
                                            <div class="position-relative fruite-item rounded">
                                                <div class="fruite-img">
                                                    <img class="img-fluid w-100 rounded-top" src="{{ $images }}"
                                                        alt="">
                                                </div>
                                                <div class="bg-secondary position-absolute rounded px-3 py-1 text-white"
                                                    style="top: 10px; left: 10px;">Fabric Care</div>
                                                <div class="border-secondary border-top-0 rounded-bottom border p-4">
                                                    <h4>
                                                        <a href="{{ route('product.detail', ['id_product' => $item->id]) }}"
                                                            wire:navigate>
                                                            {{ $item->product_name }}
                                                        </a>
                                                    </h4>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do
                                                        eiusmod te incididunt</p>
                                                    <div class="d-flex justify-content-start flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">
                                                            {{ $item->currency . ' ' . number_format($item->price) }}
                                                        </p>
                                                    </div>

                                                    <div class="d-flex justify-content-center flex-lg-wrap">
                                                        <a class="btn border-secondary rounded-pill text-primary border px-3"
                                                            wire:click="addCart({{ $item->id }})"><i
                                                                class="fa fa-shopping-bag text-primary me-2"></i> Add to
                                                            cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show p-0" id="tab-2">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">

                                    @foreach ($list_product as $item)
                                        <div class="col-md-6 col-lg-4 col-xl-3" wire:key="{{ $item->id }}">
                                            <div class="position-relative fruite-item rounded">
                                                <div class="fruite-img">
                                                    <img class="img-fluid w-100 rounded-top"
                                                        src="{{ asset('assets/frontend/portal') }}/img/fruite-item-5.jpg"
                                                        alt="">
                                                </div>
                                                <div class="bg-secondary position-absolute rounded px-3 py-1 text-white"
                                                    style="top: 10px; left: 10px;">Fabric Care</div>
                                                <div class="border-secondary border-top-0 rounded-bottom border p-4">
                                                    <h4>
                                                        <a href="{{ route('product.detail', ['id_product' => $item->id]) }}"
                                                            wire:navigate>
                                                            {{ $item->product_name }}
                                                        </a>
                                                    </h4>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do
                                                        eiusmod te incididunt</p>
                                                    <div class="d-flex justify-content-start flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">
                                                            {{ $item->currency . ' ' . number_format($item->price) }}
                                                        </p>
                                                    </div>

                                                    <div class="d-flex justify-content-center flex-lg-wrap">
                                                        <a class="btn border-secondary rounded-pill text-primary border px-3"
                                                            wire:click="addCart({{ $item->id }})"><i
                                                                class="fa fa-shopping-bag text-primary me-2"></i> Add to
                                                            cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('showResult', (response) => popResult2(response));
        });

        document.addEventListener('livewire:navigated', () => {
            Livewire.on('showResult', (response) => popResult2(response));
        });
    </script>
@endpush
