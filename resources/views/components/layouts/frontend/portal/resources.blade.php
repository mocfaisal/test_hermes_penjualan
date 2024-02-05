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
    </script>
@endsection
