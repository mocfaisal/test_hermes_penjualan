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
    </script>
@endsection
