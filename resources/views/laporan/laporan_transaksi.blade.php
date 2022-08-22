<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style type="text/css">
        #outtable {
            padding: 50px;
            border: 1px solid #e3e3e3;
            width: 90%;
            border-radius: 5px;

        }

        h1 {
            text-align: center;
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-family: arial;
            color: #5E5B5C;
        }

        thead th {
            background-color: rgb(77, 154, 255);
            color: white;
            text-align: right;
            padding: 10px;
        }

        tfoot th {
            background-color: rgb(3, 92, 210);
            color: white;
            text-align: right;
            padding: 10px;
        }

        tbody td {
            border-top: 1px solid #e3e3e3;
            padding: 10px;
            text-align: right;
        }

        tbody tr:nth-child(even) {
            background: #F6F5FA;
        }

        tbody tr:hover {
            background: #EAE9F5
        }
    </style>

</head>

<body>
    <div id="outtable">
        <h1>Data Transaksi</h1>
        <table>
            <thead>
                <tr>
                    <th>No Transaksi</th>
                    <th>Tanggal</th>
                    <th>Customer</th>
                    <th>Jumlah Barang</th>
                    <th>Sub Total</th>
                    <th>Diskon</th>
                    <th>Ongkir</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $trx)
                    <tr class="details">
                        <td width="100px">{{ $trx->kode_transaksi }}</td>
                        <td width="100px">{{ date('m/d/Y', strtotime($trx->tgl)) }}</td>
                        <td width="100px">{{ $trx->nama_customer }}</td>
                        <td width="100px">{{ $trx->qty }}</td>
                        <td width="100px">Rp. {{ number_format($trx->subtotal) }}</td>
                        <td width="100px"> @if ( $trx->diskon == 0)
                            {{ '-' }}
                        @else
                        {{ 'Rp.'.number_format($trx->diskon) }}
                        @endif</td>
                        <td width="100px">@if ( $trx->ongkir == 0)
                            {{ '-' }}
                        @else
                        {{'Rp.'. number_format($trx->ongkir) }}
                        @endif</td>
                        <td width="100px">Rp. {{ number_format($trx->total_bayar)}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="">
                <tr>

                    <th class="" colspan="6">Grand Total</th>
                    <th class="" colspan="2">Rp. {{ number_format($total) }} </th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>
