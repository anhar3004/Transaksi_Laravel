<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
        .invoice-box {
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table th {
            padding: 5px;
            vertical-align: top;
            font-size: 25px;
        }

        .invoice-box table tr th:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table th {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table th.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;

        }

        .invoice-box table tr.information table th {
            padding-bottom: 40px;
            font-size: 20px;
        }

        .invoice-box table tr.heading th {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
            text-align: center;
            font-size: 20px;
        }

        .invoice-box table tr.details th {
            padding-bottom: 20px;
            font-size: 18px;
            text-align: center;
            border-bottom: none;

        }

        .invoice-box table tr.item th {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last th {
            border-bottom: none;
        }

        .invoice-box table tr.total th:nth-child(2) {

            font-weight: bold;
            font-size: 20px;
        }

        @media only screen and (max-width: 100%) {
            .invoice-box table tr.top table th {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        @foreach ($transaksi as $trx)
            <table>
                <tr>
                    <td colspan="4" class="title" width="700px">
                        <h1>PT Mitra Sinerji Teknoindo</h1>
                    </td>
                    <td colspan="3" width="300px">
                        Invoice : {{ $trx->kode_transaksi }}<br />
                        Created : {{ date('m/d/Y', strtotime($trx->tgl)) }}<br />
                    </td>
                </tr>
            </table>

            <table>
                <tr>
                    <td colspan="4" class="title" width="700px">
                        Metro Indah Mall
                        Ruko Blok G No. 16 Lt. 2 & 3<br />
                        Kota Bandung, 40287<br />
                        (022)
                        7536407 <br>
                        info@mitrasinerji.com
                    </td>

                    <td colspan="3" width="300px">
                        {{ $trx->nama_customer }}.<br />
                        {{ $trx->alamat }}<br />
                        {{ $trx->telp }} <br>
                    </td>
                </tr>
            </table>
        @endforeach
        <br>
        <table class="barang">
            <thead>
                <tr class="heading">
                    <th rowspan="2" width="150px">Kode Barang</th>
                    <th rowspan="2" width="150px">Nama Barang</th>
                    <th rowspan="2" width="100px">Qty</th>
                    <th rowspan="2" width="100px">Harga</th>
                    <th colspan="2" width="150px">Diskon</th>
                    <th rowspan="2" width="100px">Harga Diskon</th>
                    <th rowspan="2" width="100px">Total</th>
                </tr>
                <tr class="heading">
                    <th width="100px">(%)</th>
                    <th width="100px">(Rp)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $brg)
                    <tr class="details">
                        <td>{{ $brg->kode_barang }}</td>
                        <td>{{ $brg->nama_barang }}</td>
                        <td>{{ $brg->qty }}</td>
                        <td>{{ $brg->harga }}</td>
                        <td>
                            @if ($brg->diskon_pct == 0)
                                {{ '-' }}
                            @else
                                {{ number_format($brg->diskon_pct) . '%' }}
                            @endif
                        </td>
                        <td>
                            @if ($brg->diskon_nilai == 0)
                                {{ '-' }}
                            @else
                                {{ 'Rp.' . number_format($brg->diskon_nilai) }}
                            @endif
                        </td>
                        <td>Rp. {{ number_format($brg->harga_diskon) }}</td>
                        <td>Rp. {{ number_format($brg->total) }}</td>
                    </tr>
                @endforeach
                @foreach ($transaksi as $trx)
                    <tr>
                        <td colspan="6"><br></td>
                    </tr>
                    <tr>
                        <td colspan="6"></td>
                        <td>Sub Total :</td>
                        <td>Rp. {{ number_format($trx->subtotal) }}</td>
                    </tr>
                    <tr>
                        <td colspan="6"></td>
                        <td>Diskon :</td>
                        <td>Rp. {{ number_format($trx->diskon) }}</td>
                    </tr>
                    <tr>
                        <td colspan="6"></td>
                        <td>Ongkir :</td>
                        <td>Rp. {{ number_format($trx->ongkir) }}</td>
                    </tr>
                    <tr>
                        <td colspan="6"></td>
                        <td><strong>Total : </strong> </td>
                        <td><strong>Rp.{{ number_format($trx->total_bayar) }}</strong> </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</body>

</html>
