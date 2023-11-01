<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Detail Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        td {
            border: 0.5px solid #dedede;
            font-size: 7px;
            padding: 3px;
        }

        th {
            border: 0.5px solid #dedede;
            font-size: 7px;
            padding: 3px;
            background-color: #007FFF;
            color: white;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .pending {
            border-radius: 3px;
            padding: 3px;
            color: white;
            background-color: red;
        }

        .selesai {
            padding: 3px;
            color: white;
            border-radius: 3px;
            background-color: green;
        }

        h6 {
            align-items: center;
            text-align: center;
            margin-bottom: 2px;
        }

        p {

            align-items: center;
            text-align: center;
            font-size: 15px;
            margin-bottom: 10px;
        }

        .copy{
            font-size: 10px;
        }
        .cetak{
            font-size: 10px;
            color: #007FFF;
            font-weight: 500;
        }
        .detailcetak{
            display: flex;
            flex-direction: row;
            margin-bottom: 20px;
        }
        pre{
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div>
        <h6>Laporan Data Transaksi</h6>
        <p>laporan yang berisi mengenai semua data transaksi yang masuk.</p>
        <hr>

        <div class="detailcetak">
            <div class="nama">
                <pre>Dicetak Oleh : {{ auth()->user()->nama }}</pre>
            </div>
            <div class="tanggal">
                <pre>Tanggal       :  {{ date('Y-m-d H:i:s') }}</pre>
            </div>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Transaksi</th>
                    <th>Nama Outlet</th>
                    <th>Nama Member</th>
                    <th>Nama Paket</th>
                    <th>Harga Paket</th>
                    <th>Diskon</th>
                    <th>Biaya Tambahan</th>
                    <th>Pajak</th>
                    <th>Total Harga</th>
                    <th>Tanggal Transaksi</th>
                    <th>Batas Waktu</th>
                    <th>Tanggal Bayar</th>
                    <th>Status Transaksi</th>
                    <th>Status Bayar</th>
                    <th>Via Admin</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailtransaksis as $detail)
                    <tr>
                        <td>{{ $detail->id }}</td>

                        <td>{{ $detail->transaksi->kode_invoice }}</td>

                        <td class="py-6 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="pl-4 mr-2 text-left">
                                <div class="text-base font-weight-bold">
                                    {{ $detail->transaksi->outlet->nama }}
                                </div>
                                <div class="font-weight-normal text-secondary">
                                    {{ $detail->transaksi->outlet->alamat }}
                                </div>
                            </div>
                        </td>

                        <td class="py-6 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="pl-4 mr-2 text-left">
                                <div class="text-base font-weight-bold">
                                    {{ $detail->transaksi->member->nama }}
                                </div>
                                <div class="font-weight-normal text-secondary">
                                    {{ $detail->transaksi->member->alamat }}
                                </div>
                            </div>
                        </td>

                        <td class="py-6 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="pl-4 mr-2 text-left">
                                <div class="text-base font-weight-bold">
                                    {{ $detail->paket->nama_paket }}
                                </div>
                                <div class="font-weight-normal text-secondary">
                                    {{ $detail->paket->nama_paket }}
                                </div>
                            </div>
                        </td>


                        <td> {{ $detail->paket->harga }}</td>

                        @if ($detail->transaksi->diskon === null)
                            <td>-</td>
                        @else
                            <td> {{ $detail->transaksi->diskon }}</td>
                        @endif

                        @if ($detail->transaksi->biaya_tamabahan === null)
                            <td>-</td>
                        @else
                            <td> {{ $detail->transaksi->biaya_tamabahan }}</td>
                        @endif

                        @if ($detail->transaksi->pajak === null)
                            <td>-</td>
                        @else
                            <td> {{ $detail->transaksi->pajak }}</td>
                        @endif

                        <td> {{ $detail->totalharga }}</td>

                        <td>{{ $detail->transaksi->tanggal }}</td>

                        <td>{{ $detail->transaksi->batas_waktu }}</td>

                        <td>{{ $detail->transaksi->tanggal_bayar }}</td>

                        @if ($detail->transaksi->status === 'Pending')
                            <td> <span class="pending">{{ $detail->transaksi->status }}</span></td>
                        @else
                            <td> <span class="selesai">{{ $detail->transaksi->status }}</span></td>
                        @endif

                        <td>{{ $detail->transaksi->status_bayar }}</td>

                        <td class="py-6 text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="pl-4 mr-2 text-left">
                                <div class="text-base font-weight-bold">
                                    {{ $detail->transaksi->user->nama }}
                                </div>
                                <div class="font-weight-normal text-secondary">
                                    {{ $detail->transaksi->user->role }}
                                </div>
                            </div>
                        </td>

                        <td>{{ $detail->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p class="copy">Dicetak menggunakan library : <span class="cetak">dompdf(barryvdh)</span></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
