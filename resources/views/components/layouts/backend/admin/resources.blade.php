
@section('global.javascript.footer')

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
    </script>

    <script data-navigate-once>
        function popResult2(response) {
            let res = response.result;

            if (res.success) {
                Swal.fire({
                    title: "Success",
                    text: res.msg,
                    icon: 'success',
                    confirmButtonText: "OK",
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
                    title: "Error",
                    text: res.msg,
                    icon: 'error',
                });
            }
        }

        function popResultConfirm(response) {
            let res = response.result;

            if (res.success) {
                Swal.fire({
                    title: "Success",
                    text: res.msg,
                    icon: 'success',
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {}

                    Swal.fire({
                        title: "Info",
                        text: res.msg_confirm,
                        icon: 'info',
                        showDenyButton: true,
                        confirmButtonText: "Yes",
                        denyButtonText: "No",
                    }).then((result2) => {
                        if (result2.isConfirmed) {
                            window.location.reload();
                        } else if (result2.isDenied) {
                            if (res.uri) {
                                window.location.href = res.uri;
                            }
                        }
                    });
                });
            } else {
                Swal.fire({
                    title: "Error",
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
