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
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <!-- Checkout Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="mb-4">Checkout</h1>
            @if (!empty($this->dataCart))
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Products</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                        <p class="mb-0 mt-4">{{ $item->currency . ' ' . number_format($item->price) }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $item->quantity }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">
                                            {{ $item->currency . ' ' . number_format($item->subtotal) }}
                                        </p>
                                    </td>

                                </tr>
                            @endforeach
                            <tr>
                                <th scope="row">
                                </th>
                                <td class="py-5"></td>
                                <td class="py-5"></td>
                                <td class="py-5">
                                    <p class="mb-0 text-dark py-3">Subtotal</p>
                                </td>
                                <td class="py-5">
                                    <div class="py-3 border-bottom border-top">
                                        <p class="mb-0 text-dark">{{ $item->currency  . ' ' . number_format($this->dataCart->total) }}</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                </th>
                                <td class="py-5">
                                    <p class="mb-0 text-dark py-4">Shipping</p>
                                </td>
                                <td colspan="3" class="py-5">
                                    <div class="form-check text-start">
                                        <input type="radio" class="form-check-input bg-primary border-0" id="Shipping-1" name="Shipping-1" value="Shipping" checked>
                                        <label class="form-check-label" for="Shipping-1">Free Shipping</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                </th>
                                <td class="py-5">
                                    <p class="mb-0 text-dark text-uppercase py-3" style="font-weight: bold;">TOTAL</p>
                                </td>
                                <td class="py-5"></td>
                                <td class="py-5"></td>
                                <td class="py-5">
                                    <div class="py-3 border-bottom border-top">
                                        <p class="mb-0 text-dark" style="font-weight: bold;">{{ $item->currency  . ' ' . number_format($this->dataCart->total) }}</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row g-4 align-items-center justify-content-center border-bottom py-3 text-center">
                    <div class="col-12">
                        <div class="form-check my-3 text-start">
                            <input type="radio" class="form-check-input bg-primary border-0" name="Transfer"
                                id="Transfer-1" value="Transfer" checked>
                            <label class="form-check-label" for="Transfer-1">Transfer Bank</label>
                        </div>
                        <p class="text-dark text-start">Make your payment directly into our bank account.
                            Please use your Order ID as the payment reference. Your order will not be shipped
                            until the funds have cleared in our account.</p>
                    </div>
                </div>

                <div class="row g-4 align-items-center justify-content-center pt-4 text-center">
                    <button type="button"
                        class="btn border-secondary text-uppercase w-100 text-primary px-4 py-3" wire:click="processCheckout">Place
                        Order</button>
                </div>
            </div>
            @else
                <div class="row g-4 align-items-center justify-content-center">
                    <div class="col-12">
                        <div class="alert alert-warning" role="alert">
                            Your cart is empty
                            <a class="btn border" href="{{ route('home') }}" wire:navigate>Click here to Continue Shopping</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Checkout Page End -->

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
