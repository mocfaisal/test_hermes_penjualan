<div>

    <div class="modal fade text-left" id="mdl_product" data-bs-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="mdl_product_label" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mdl_product_label">
                        @if ($is_edit)
                            Edit
                        @else
                            Add
                        @endif
                        Data Product
                    </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>

                <form>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" placeholder="Product Name"
                                        wire:model="input_name" required>
                                    @error('input_name')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Product Code</label>
                                    <input type="text" class="form-control" placeholder="Product Code"
                                        wire:model="input_code">
                                    <span class="text-muted">*Blank for auto generated</span>
                                    @error('input_code')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <label for="input_currency">Price</label>
                                <div class="col-md-4 col-4">
                                    <div class="form-group">
                                        <label for="input_currency">Currency</label>
                                        <input type="text" class="form-control" placeholder="Currency (IDR, USD, etc)"
                                            wire:model="input_currency" maxlength="5" required>
                                        @error('input_currency')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="form-group">
                                        <label for="input_price">Price</label>
                                        <input type="number" class="form-control" placeholder="Price"
                                            wire:model="input_price" required>
                                        @error('input_price')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-2 col-2">
                                    <div class="form-group">
                                        <label for="input_discount">Discount(%)</label>
                                        <input type="number" class="form-control" placeholder="Discount(%)"
                                            wire:model="input_discount" required min="0" max="100"
                                            value="0">
                                        @error('input_discount')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-3">
                                <div class="form-group">
                                    <label>Unit</label>
                                    <input type="text" class="form-control" placeholder="Unit (pcs, kg, etc)"
                                        wire:model="input_unit" required>
                                    @error('input_unit')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-9 col-9">
                                <div class="form-group">
                                    <label>Dimension</label>
                                    <input type="text" class="form-control" placeholder="Dimension (LxWxH)"
                                        wire:model="input_dimension" required>
                                    @error('input_dimension')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary" wire:click="save">Simpan</button>
                        </div>
                </form>

            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        // Variable Declare
        var modal_elem = '#mdl_product';

        document.addEventListener('livewire:initialized', () => {
            var myModalEl = document.querySelector(modal_elem)
            var modal = bootstrap.Modal.getOrCreateInstance(myModalEl)

            @this.on('showResult', (response) => popResult2(response));
            @this.on('showResultConfirm', (response) => popResultConfirm(response));
        });

        document.addEventListener('livewire:navigated', () => {
            // console.log('livewire load code when navigated');
            Livewire.on('showResult', (response) => popResult2(response));
            Livewire.on('showResultConfirm', (response) => popResultConfirm(response));
        });
    </script>

    <script>
        // Document ready
        $(function() {

            // Variable Declare

            // Function declare

            // Initial plugins


            // On Events
            // Initial function


        });
    </script>
@endpush
