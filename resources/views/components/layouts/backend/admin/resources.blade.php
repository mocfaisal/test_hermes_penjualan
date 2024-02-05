
@section('global.javascript.footer')

    {{-- <script data-navigate-once>
        document.addEventListener('livewire:init', () => {
            // Runs after Livewire is loaded but before it's initialized
            // on the page...
            console.log('livewire before init');
            @yield('global.livewire.js.before.init')
        });

        document.addEventListener('livewire:initialized', () => {
            // Runs immediately after Livewire has finished initializing
            // on the page...
            console.log('livewire after init');
            @yield('global.livewire.js.after.init')
        });

        document.addEventListener('livewire:load', () => {
            console.log('livewire load js code');

            @yield('global.livewire.js.load.init')

        });
    </script> --}}

    <script data-navigate-once>
        document.addEventListener('livewire:initialized', () => {
            // NOTE Reinitialize Sidebar
            const sidebar = new window.Sidebar(document.getElementById("sidebar"), {
                recalculateHeight: true
            })
        });

        document.addEventListener('livewire:navigated', () => {
            // NOTE Reinitialize Sidebar
            const sidebar = new window.Sidebar(document.getElementById("sidebar"), {
                recalculateHeight: true
            })
        });
    </script>

    <script data-navigate-once>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const Swal2 = Swal.mixin({
            customClass: {
                input: 'form-control'
            }
        });

        // Choices
        let choices = document.querySelectorAll(".choices")
        let initChoice
        for (let i = 0; i < choices.length; i++) {
            if (choices[i].classList.contains("multiple-remove")) {
                initChoice = new Choices(choices[i], {
                    delimiter: ",",
                    editItems: true,
                    maxItemCount: -1,
                    removeItemButton: true,
                })
            } else {
                initChoice = new Choices(choices[i])
            }
        }

        // Select2
        $('.select2').select2({
            theme: 'bootstrap-5',
            minimumInputLength: -1,
            allowClear: true,
            placeholder: "Select..."
        });

        // FilePond
        // FilePond.registerPlugin(
        //     FilePondPluginImagePreview,
        //     FilePondPluginImageExifOrientation,
        //     FilePondPluginFileValidateSize,
        //     FilePondPluginFileValidateType
        // );
    </script>

    <script data-navigate-once>
        function popResult2(response) {
            let res = response.result;

            if (res.success) {
                Swal.fire({
                    title: "{{ __('custom.swal.title.success') }}",
                    text: res.msg,
                    icon: 'success',
                    confirmButtonText: "{{ __('custom.swal.button.ok') }}",
                }).then((result) => {
                    if (result.isConfirmed) {}
                    if (res.uri) {
                        window.location.href = res.uri;
                    } else {
                        window.location.reload();
                    }
                });
            } else {
                Swal.fire({
                    title: "{{ __('custom.swal.title.error') }}",
                    text: res.msg,
                    icon: 'error',
                });
            }
        }

        window.showActive = function(active_link = null) {
            // NOTE Reff : https://github.com/livewire/livewire/discussions/6043#discussioncomment-7008926
            // NOTE not tested for level-2 submenu
            // FIXME there is bug when refreshed page & on another menu like create, edit, detail. showing error on console

            active_link = active_link ?? document.URL.split(/[?#]/)[0];
            document.querySelectorAll('.sidebar-menu ul a').forEach(function(item) {
                if (active_link == item.getAttribute("href") && (active_link != 'javascript:void(0);' &&
                        active_link != '#')) {
                    item.parentNode.classList.add('active');
                    item.parentNode.parentNode.parentNode.classList.add('active');

                } else {
                    item.parentNode.classList.remove('active')
                }
            });
        };

        document.querySelectorAll('.sidebar-menu ul a').forEach(element => element.addEventListener('click', e => {
            showActive(element.getAttribute("href"));
        }));

        function initTooltipsBS() {
            const tooltipTriggerList = document.querySelectorAll('[data-bs-tooltip="true"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        }

        window.showActive();
    </script>
@endsection
