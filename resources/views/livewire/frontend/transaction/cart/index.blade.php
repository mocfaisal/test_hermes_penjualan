@php

    $disk = 'public';
    $file_name = '/Logo-SK.png';
    $file_path = 'storage/uploads/images' . $file_name;
    $images = '';

    if (Storage::disk($disk)->exists($file_path)) {
        $url = Storage::disk($disk)->url($file_path);
        $images = asset($url);
    }

@endphp

<div>
    {{-- Do your work, then step back. --}}

    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="mb-4">Cart</h1>

            @if (!empty($this->dataCart))

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Products</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($this->listCart))
                                @foreach ($this->listCart as $item)
                                    <tr wire:key="{{ $item->id }}">
                                        <th scope="row">
                                            <div class="d-flex align-items-center">
                                                <img class="img-fluid rounded-circle me-5" src="{{ $images }}"
                                                    style="width: 80px; height: 80px;" alt="">
                                            </div>
                                        </th>
                                        <td>
                                            <p class="mb-0 mt-4">{{ $item->product_name }}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0 mt-4">
                                                {{ $item->currency . ' ' . number_format($item->price) }}
                                            </p>
                                        </td>
                                        <td>
                                            <div class="input-group quantity mt-4" style="width: 100px;">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border"
                                                        wire:click="updateQty({{ $item->id }}, 1,'-')">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                                <input type="text"
                                                    class="form-control form-control-sm border-0 text-center"
                                                    value="{{ $item->quantity }}"
                                                    wire:change="updateQty({{ $item->id }}, $event.target.value)">
                                                <div class="input-group-btn">
                                                    <button
                                                        class="btn btn-sm btn-plus rounded-circle bg-light border"wire:click="updateQty({{ $item->id }}, 1,'+')">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 mt-4">
                                                {{ $item->currency . ' ' . number_format($item->subtotal) }}
                                            </p>
                                        </td>
                                        <td>
                                            <button class="btn btn-md rounded-circle bg-light mt-4 border"
                                                wire:click="removeProduct({{ $item->id }})">
                                                <i class="fa fa-times text-danger"></i>
                                            </button>
                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                {{-- <div class="mt-5">
                    <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
                </div> --}}
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p class="mb-0">
                                        {{ $item->currency . ' ' . number_format($this->dataCart->total) }}
                                    </p>
                                </div>
                                {{-- <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Shipping</h5>
                                    <div class="">
                                        <p class="mb-0">Flat rate: $3.00</p>
                                    </div>
                                </div>
                                <p class="mb-0 text-end">Shipping to Ukraine.</p> --}}
                            </div>
                            <div class="border-top border-bottom d-flex justify-content-between mb-4 py-4">
                                <h5 class="mb-0 me-4 ps-4">Total</h5>
                                <p class="mb-0 pe-4">
                                    {{ $item->currency . ' ' . number_format($this->dataCart->total) }}
                                </p>
                            </div>
                            <a class="btn border-secondary rounded-pill text-primary text-uppercase mb-4 ms-4 px-4 py-3"
                                href="{{ route('checkout.index') }}" wire:navigate>Proceed
                                Checkout</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="row g-4 justify-content-center">
                    <div class="col-12">
                        <div class="text-center">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Empty</span></h1>
                            <a class="btn border" href="{{ route('home') }}" wire:navigate>Continue Shopping</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Cart Page End -->

</div>
