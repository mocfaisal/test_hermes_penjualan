@section('app.title', 'Inventory')
@section('content.header.title', 'Inventory')

<div>
    {{-- Root div must be added --}}

    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h4 class="card-title">List Data</h4>
            </div>
            <div class="float-end">
                <div class="buttons">
                    <a class="btn icon icon-left btn-primary" data-bs-toggle="modal" data-bs-target="#mdl_product"><i
                            class="bi bi-plus"></i> Add Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive" id="field_table"></div>
        </div>
        <div class="card-footer">
            <div class="text-muted">
                {{-- <span>*Status Display is showed on footer of page</span> --}}
            </div>
        </div>

    </div>

    <livewire:backend.master.product.create>

</div>

{{-- Resources --}}
{{-- External Code --}}
@section('private.css.file')

@endsection

@section('private.js.file')

@endsection

{{-- Internal Code --}}
@section('private.css.code')

@endsection

@section('private.js.code')

    <script>
        // Variable Declare
        var table = null;

        // Function Declare
        async function initTableElem() {
            const field_table = $('#field_table');
            const txt =
                '<table id="tbl_list" class="table-striped table-hover table table" style="width: 100%;"> <thead> <tr> <td style="vertical-align: middle; text-align: center;">No</td> <td style="vertical-align: middle; text-align: center;">Name</td> <td style="vertical-align: middle; text-align: center;">Code</td> <td style="vertical-align: middle; text-align: center;">Currency</td> <td style="vertical-align: middle; text-align: center;">Price</td> <td style="vertical-align: middle; text-align: center;">Unit</td> <td style="vertical-align: middle; text-align: center;">Discount</td> <td style="vertical-align: middle; text-align: center;">DImension</td> <td style="vertical-align: middle; text-align: center;">Action</td> </tr> </thead> </table>';
            field_table.html(txt);
            return true;
        }

        async function loadData() {
            var tbl_link = "{{ route('backend.admin.master.product.getData.table') }}";

            var ajaxOptions = {
                url: tbl_link,
                type: "POST",
                dataType: "JSON",
            };

            table = await $('#tbl_list').DataTable({
                "drawCallback": function(settings) {
                    // NOTE init bootstrap tooltip after load data
                    initTooltipsBS();
                },
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: ajaxOptions,
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'product_name',
                    },
                    {
                        data: 'product_code',
                    },
                    {
                        data: 'currency',
                    },
                    {
                        data: 'price',
                    },
                    {
                        data: 'unit',
                    },
                    {
                        data: 'discount',
                    },
                    {
                        data: 'dimension',
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                columnDefs: [{
                    className: 'dt-center',
                    targets: [0, 3, 8]
                }],
                order: [
                    [1, 'asc']
                ]
            });

            return false;
        }

        async function initTable() {
            if (table instanceof $.fn.dataTable.Api) {
                table.clear().destroy();
            }

            let is_table_ini = await initTableElem();
            if (is_table_ini) {
                loadData();
            }
        }

        function popDelete(id) {
            Swal.fire({
                title: "Are you sure want to delete this data?",
                showDenyButton: true,
                confirmButtonText: "Yes",
                denyButtonText: "No",
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('destroy', id);
                }
            })
        }

        // On Event

        // initial function
        initTable();
    </script>

    <script>
        document.addEventListener('livewire:initialized', () => {
            var myModalEl = document.querySelector('#mdl_product')
            var modal = bootstrap.Modal.getOrCreateInstance(myModalEl)

            // Listen to dispatch from server
            @this.on('showResult', (response) => {
                popResult(table, response);
                modal.hide();
            });

            @this.on('refresh-data', (event) => {
                // setTimeout(() => {
                modal.hide();
                // @this.dispatch('reset-modal');
                // }, 5000);
            })

            @this.on('edit-mode', (res) => {
                // modal.show();


            })

            myModalEl.addEventListener('shown.bs.modal', (event) => {

            });

            myModalEl.addEventListener('hidden.bs.modal', (event) => {
                @this.dispatch('reset-modal');

            });

        });

        document.addEventListener('livewire:navigated', () => {
            // console.log('livewire load code when navigated');
            // Listen to dispatch from server

            var myModalEl = document.querySelector('#mdl_product')
            var modal = bootstrap.Modal.getOrCreateInstance(myModalEl)

            Livewire.on('showResult', (response) => popResult(table, response));

            Livewire.on('edit-mode', (res) => {
                // modal.show();


            })

            myModalEl.addEventListener('hidden.bs.modal', (event) => {
                @this.dispatch('reset-modal');

            });
        });

        document.addEventListener('livewire:navigating', () => {
            // Mutate the HTML before the page is navigated away...
        });
    </script>
@endsection
