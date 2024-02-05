@section('javascript.code.global')
    <script>
        function popResult(response) {
            let res = response.result;

            if (res.success) {
                if (res.uri) {
                    window.location.href = res.uri;
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
