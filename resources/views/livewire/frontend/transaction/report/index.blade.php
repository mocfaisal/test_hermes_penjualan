<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <!-- Checkout Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="mb-4">History Transaction</h1>

            <div class="col-12">

                <div class="input-group">
                    <span class="input-group-text">Date Range</span>
                    <input type="date" class="form-control" id="date_start" title="Start Date" wire:model="date_start"
                        max="{{ date('Y-m-d') }}">
                    <input type="date" class="form-control" id="date_end" title="End Date" wire:model="date_end"
                        max="{{ date('Y-m-d') }}">
                    <button class="btn btn-primary" wire:click="searchData">Search</button>
                </div>
            </div>

            <br>

            @if (!empty($this->dataCart))

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="text-align: center; vertical-align: middle;">No</th>
                                <th style="text-align: center; vertical-align: middle;">Transaction</th>
                                <th style="text-align: center; vertical-align: middle;">User</th>
                                <th style="text-align: center; vertical-align: middle;">Status</th>
                                <th style="text-align: center; vertical-align: middle;">Date</th>
                                <th style="text-align: center; vertical-align: middle;">Total</th>
                                <th style="text-align: center; vertical-align: middle;">Item</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($this->dataCart as $item)
                                <tr wire:key="{{ $item->id }}">
                                    <td style="text-align: center; vertical-align: middle;">{{ $loop->iteration }}</td>

                                    <td style="vertical-align: middle;">
                                        {{ $item->document_code . ' - ' . $item->document_number }}
                                    </td>
                                    <td style="vertical-align: middle;">
                                        {{ $item->user }}
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        {{ $item->status }}
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        {{ Carbon\Carbon::parse($item->tgl_trx)->format('d F Y') }}
                                    </td>
                                    <td style="vertical-align: middle;">
                                        Rp. {{ number_format($item->total) }},-
                                    </td>
                                    <td style="vertical-align: top;">
                                        @foreach ($item->detail as $detail_item)
                                            {{ $detail_item->product_name }} X {{ $detail_item->quantity }} <br>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <button class="btn btn-primary" wire:click="printReport">Print</button>
                @else
                    <div class="row g-4 align-items-center justify-content-center">
                        <div class="col-12">
                            <div class="alert alert-warning" role="alert">
                                Your transaction is empty
                                <a class="btn border" href="{{ route('home') }}" wire:navigate>Click here to
                                    Continue
                                    Shopping</a>
                            </div>
                        </div>
                    </div>
            @endif
        </div>

    </div>
</div>
<!-- Checkout Page End -->

</div>

@push('scripts')
    <script>
        document.getElementById('date_start').onchange = function() {
            var inputElement_start = document.getElementById('date_start');
            var inputElement_end = document.getElementById('date_end');
            var value_start = inputElement_start.value;
            var value_end = inputElement_end.value;

            // @this.set('date_start', this.value);
            if (value_end) {
                if (value_start > value_end) {
                    inputElement_start.value = value_end;
                }
            }

        }

        document.getElementById('date_end').onchange = function() {
            var inputElement_start = document.getElementById('date_start');
            var inputElement_end = document.getElementById('date_end');
            var value_start = inputElement_start.value;
            var value_end = inputElement_end.value;

            // @this.set('date_start', this.value);
            if (value_end) {
                if (value_start > value_end) {
                    inputElement_start.value = value_end;
                }
            }

        }

        document.addEventListener('livewire:initialized', () => {
            @this.on('showResult', (response) => popResult2(response));
        });

        document.addEventListener('livewire:navigated', () => {
            Livewire.on('showResult', (response) => popResult2(response));
        });
    </script>
@endpush
