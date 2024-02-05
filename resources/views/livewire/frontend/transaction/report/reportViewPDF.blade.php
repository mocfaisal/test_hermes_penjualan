<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
      * { font-family: DejaVu Sans, sans-serif; }
    </style>
    <title>Report History Transaction</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 11pt;
        }
    </style>

    <center>
        <h5>Report History Transaction</h4>
    </center>

    <br>

    <div class="table-responsive">
        <table class="table-bordered table-striped table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Transaction Code</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData as $item)
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">{{ $loop->iteration }}</td>
                        <td>
                            {{ $item->document_code . '-' . $item->document_number }}
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            {{ $item->status }}

                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            {{ $item->tgl_trx }}
                        </td>
                        <td>
                            {{ number_format($item->total) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

</body>

</html>
