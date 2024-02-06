@section('javascript.code.global')
    <script>
        function popResult(response) {
            let res = response.result;

            if (res.success) {
                Swal.fire({
                    title: "Success",
                    text: res.msg,
                    icon: 'success',
                });
            } else {
                Swal.fire({
                    title: "Error",
                    text: res.msg,
                    icon: 'error',
                });
            }
        }

        function popResult2(response) {
            let res = response.result;

            if (res.success) {
                if (res.uri) {
                        window.location.href = res.uri;
                    } else {
                        window.location.reload();
                    }
            } else {
                Swal.fire({
                    title: "Error",
                    text: res.msg,
                    icon: 'error',
                });
            }
        }

        function popResult3(response) {
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
    </script>
@endsection
