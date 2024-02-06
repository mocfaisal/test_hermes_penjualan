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
    {{-- Do your work, then step back. --}}

    <!-- Single Product Start -->
    <div class="container-fluid mt-5 py-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-9">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="rounded border">
                                <img class="img-fluid rounded" src="{{ $images }}" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="fw-bold mb-3">{{ $data_product->product_name }}</h4>
                            <p class="mb-3">Category: Fabric Care</p>
                            <h5 class="fw-bold mb-3">
                                {{ $data_product->currency . ' ' . number_format($data_product->price) }}</h5>
                            {{-- <div class="d-flex mb-4">
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star"></i>
                            </div> --}}
                            <p class="mb-4">The generated Lorem Ipsum is therefore always free from repetition
                                injected humour, or non-characteristic words etc.</p>
                            <p class="mb-4">Susp endisse ultricies nisi vel quam suscipit. Sabertooth peacock
                                flounder; chain pickerel hatchetfish, pencilfish snailfish</p>
                            <div class="input-group quantity mb-5" style="width: 120px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border"
                                        wire:click="decrementQty">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm border-0 text-center"
                                    id="qty_product_cart" value="1" oninput="validateInput()" maxlength="5"
                                    wire:model="qty_product_cart" wire:change="updateQty($event.target.value)">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border"
                                        wire:click="incrementQty">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <a class="btn border-secondary rounded-pill text-primary mb-4 border px-4 py-2"
                                wire:click="addCart({{ $data_product->id }})"><i
                                    class="fa fa-shopping-bag text-primary me-2"></i> Add to cart</a>
                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button type="button" class="nav-link active border-bottom-0 border-white"
                                        id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                        role="tab" aria-controls="nav-about"
                                        aria-selected="true">Description</button>

                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active" id="nav-about" role="tabpanel"
                                    aria-labelledby="nav-about-tab">
                                    <p>The generated Lorem Ipsum is therefore always free from repetition injected
                                        humour, or non-characteristic words etc.
                                        Susp endisse ultricies nisi vel quam suscipit </p>
                                    <p>Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish
                                        filefish Antarctic
                                        icefish goldeye aholehole trumpetfish pilot fish airbreathing catfish, electric
                                        ray sweeper.</p>
                                    <div class="px-2">
                                        <div class="row g-4">
                                            <div class="col-6">
                                                <div
                                                    class="row bg-light align-items-center justify-content-center py-2 text-center">
                                                    <div class="col-6">
                                                        <p class="mb-0">Dimension</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">{{ $data_product->dimension }}</p>
                                                    </div>
                                                </div>

                                                <div
                                                    class="row bg-light align-items-center justify-content-center py-2 text-center">
                                                    <div class="col-6">
                                                        <p class="mb-0">Price Unit</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0">{{ $data_product->unit }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-xl-3">
                    <div class="row g-4 fruite">
                        <div class="col-lg-12">

                            <div class="mb-4">
                                <h4>Categories</h4>
                                <ul class="list-unstyled fruite-categorie">
                                    <li>
                                        <div class="d-flex justify-content-between fruite-name">
                                            <a href="#"><i class="fas fa-apple-alt me-2"></i>Fabric Care</a>
                                            <span>(3)</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Single Product End -->

</div>

@push('scripts')
    <script>
        function validateInput() {
            var inputElement = document.getElementById('qty_product_cart');
            var inputValue = inputElement.value;

            // Remove non-numeric characters
            inputValue = inputValue.replace(/[^0-9]/g, '');

            // Set default value to 1 if empty
            inputValue = inputValue === '' ? 1 : inputValue;

            // Update the input field with the cleaned value
            inputElement.value = inputValue;
        }

        // document.getElementById("qty_product_cart").onkeydown = function(e) {
        //     if (((e.keyCode < 48) || (e.keyCode > 57)) && e.keyCode != 8) {
        //         return false;
        //     }
        //     return true;
        // };

        document.addEventListener('livewire:initialized', () => {
            @this.on('showResult', (response) => popResult2(response));

            document.getElementById("qty_product_cart").onchange = function(e) {
                @this.set('qty_product_cart', e.target.value);
            };

        });

        document.addEventListener('livewire:navigated', () => {
            Livewire.on('showResult', (response) => popResult2(response));
        });
    </script>
@endpush
