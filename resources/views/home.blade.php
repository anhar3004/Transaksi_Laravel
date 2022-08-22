@extends('layouts.main')

@section('title', 'Dashboard Admin')

@include('layouts.header')

@include('layouts.sidebar')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="overview-wrap">
                            <h1 class="title-1">Welcome <strong>"{{ auth()->user()->nama }}" </strong> </h1>
                        </div>
                        <br>
                        <div class="overview-wrap">
                            <h4 class="">"Selamat pagi,semoga aktivitas kamu berjalan lancar"</h4>
                        </div>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class=" col-md-3">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{ $customer }}</h2>
                                        <span>Total Customers</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-3">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{ $barang }}</h2>
                                        <span>Total Product</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-3">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{ $transaksi }}</h2>
                                        <span>Total Transaksi</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart3"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-3">
                        <div class="overview-item overview-item--c4">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{ number_format($total) }}</h2>
                                        <span>total Pendapatan</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart4"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title-1 m-b-25">Transaksi</h2>
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-hover table-earning" id="tabel_transaksi">
                                <thead class="">
                                    <tr>
                                        <th>No</th>
                                        <th>No Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Nama Customer</th>
                                        <th>Jumlah Barang</th>
                                        <th>Sub Total</th>
                                        <th>Diskon</th>
                                        <th>Ongkir</th>
                                        <th>Total</th>

                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © Anhar Hadhitya 18111184 TIF RM 18 CIDA </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->

    <script type="text/javascript">

        $(document).ready(function() {
            tabel_transaksi();
        });

        function tabel_transaksi() {
            $('#tabel_transaksi').DataTable({

                "ajax": {
                    "url": "http://127.0.0.1:8000/api/admin/transaksi/tabel_transaksi",
                    "dataSrc": ""
                },
                "columns": [{
                        data: null,
                        sortable: false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: "kode_transaksi",
                    },
                    {
                        data: "tgl"
                    },
                    {
                        data: "nama_customer",
                    },
                    {
                        data: "qty",
                    },
                    {
                        data: "subtotal",
                        mRender: function(data) {
                            return `Rp. ${parseInt(data)}`;
                        }
                    },
                    {
                        data: "diskon",
                        mRender: function(data) {
                            if (data == 0) {
                                return `-`;
                            } else {
                                return `Rp. ${parseInt(data)}`;
                            }
                        }
                    },
                    {
                        data: "ongkir",
                        mRender: function(data) {
                            if (data == 0) {
                                return `-`;
                            } else {
                                return `Rp. ${parseInt(data)}`;
                            }
                        }
                    },
                    {
                        data: "total_bayar",
                        mRender: function(data) {
                            return `Rp. ${parseInt(data)}`;
                        }
                    },
                ]
            })


            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/transaksi/grand_total',
                type: 'GET',

                success: function(data) {
                    $('.grand_total').html('Rp. ' + parseInt(data));
                }
            });

        }
    </script>
@endsection
