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
            text-align: left;
            padding: 10px;
        }

        tbody td {
            border-top: 1px solid #e3e3e3;
            padding: 10px;
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
        <h1>Data Barang</h1>
        <table>
            <thead>
                <tr>
                    <th>Kode Customer</th>
                    <th>Nama Customer</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer as $cst)
                    <tr class="details">
                        <td width="100px">{{ $cst->kode_customer }}</td>
                        <td width="100px">{{ $cst->nama_customer }}</td>
                        <td width="100px">{{ $cst->telp }}</td>
                        <td width="100px">{{ $cst->alamat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
