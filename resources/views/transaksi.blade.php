@extends('layouts.main')

@section('title', 'Data Transaksi')

@include('layouts.header')

@include('layouts.sidebar')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h1 class="title-1 fw-bold"><strong>Data Transaksi</strong></h1>
                    </div>
                    <hr style="height:10px;border:none;color:#333;background-color:#333;" />
                    <div class="table-data__tool" id="tambah_transaksi">
                        <div class="table-data__tool-right">
                            <button class="au-btn au-btn-icon au-btn--blue au-btn--small" onclick="formTambah()">
                                <i class="zmdi zmdi-plus"></i>Tambah Transaksi</button>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small " data-toggle="modal"
                                data-target="#modalCetak">
                                <i class="zmdi zmdi-print"></i>Cetak Laporan</button>
                        </div>
                    </div>
                    <div class="table-responsive table--no-card m-b-30">
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
                                    <th>Cetak</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot class="bg-primary text-white">
                                <tr>
                                    <th colspan="4"></th>
                                    <th class="text-center" colspan="4">Grand Total</th>
                                    <th class="grand_total" colspan="3"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-md-12" id="form_tambah">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <h4>Transaki</h4>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">No Transaki</label>
                                    <input name="no_transaksi" type="text" id="vat" placeholder=""
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label ">Tanggal</label>
                                        <input name="tgl" class="form-control "  type="text" value="{{ date('Y-m-d') }}"/>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <h4>Customer</h4>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Kode Customer</label>
                                    <select id="inputState" class="form-control" name="kode_customer"
                                        onchange="data_customer()">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Nama Customer</label>
                                    <input name="nama_customer" type="text" id="vat" placeholder=""
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Telpon</label>
                                    <input name="telp" type="number" id="vat" placeholder="" class="form-control"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Alamat</label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="alamat" id="" cols="30" rows="3" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <h4>Barang</h4>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Kode Barang</label>
                                    <select id="inputState" class="form-control" name="kode_barang"
                                        onchange="data_barang()">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Nama Barang</label>
                                    <input name="nama_barang" type="text" id="vat" placeholder=""
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Harga</label>
                                    <input name="harga" type="text" id="vat" placeholder=""
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Jumlah</label>
                                    <input name="jumlah" type="number" id="vat" placeholder=""
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Diskon (%)</label>
                                    <input name="diskon_pct" type="number" id="vat" placeholder=""
                                        class="form-control">
                                </div>
                                <div class="" id="button">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-12" id="form_edit">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <h4>Transaki</h4>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">No Transaki</label>
                                    <input name="no_transaksi" type="text" id="vat" placeholder=""
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label ">Tanggal</label>
                                    <input name="tgl" type="text" placeholder="" class="form-control"
                                        autocomplete="off">
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <h4>Customer</h4>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Kode Customer</label>
                                    <select id="inputState" class="form-control" name="kode_customer"
                                        onchange="data_customer()">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Nama Customer</label>
                                    <input name="nama_customer" type="text" id="vat" placeholder=""
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Telpon</label>
                                    <input name="telp" type="number" id="vat" placeholder=""
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Alamat</label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="alamat" id="" cols="30" rows="3" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <h4>Barang</h4>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Kode Barang</label>
                                    <select id="inputState" class="form-control" name="kode_barang"
                                        onchange="data_barang()">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Nama Barang</label>
                                    <input name="nama_barang" type="text" id="vat" placeholder=""
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Harga</label>
                                    <input name="harga" type="text" id="vat" placeholder=""
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Jumlah</label>
                                    <input name="jumlah" type="number" id="vat" placeholder=""
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Diskon (%)</label>
                                    <input name="diskon_pct" type="number" id="vat" placeholder=""
                                        class="form-control">
                                </div>
                                <div class="" id="button">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-hover table-earning" id="tabel_detail">
                            <thead>
                                <tr>
                                    <th rowspan="2">Action</th>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Kode Barang</th>
                                    <th rowspan="2">Nama Barang</th>
                                    <th rowspan="2">Qty</th>
                                    <th rowspan="2">Harga Bandrol</th>
                                    <th colspan="2">Diskon</th>
                                    <th rowspan="2">Harga Diskon</th>
                                    <th rowspan="2">Total</th>
                                </tr>
                                <tr>
                                    <th>(%)</th>
                                    <th>(Rp)</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-12" id="total">
                    <div class="form-group row">
                        <label class="col-md-9 col-form-label text-right"><strong>Sub Total </strong> </label>
                        <div class="col-md-3">
                            <input name="sub_total" type="number" placeholder="" class="form-control text-right"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-9 col-form-label text-right"><strong>Diskon</strong> </label>
                        <div class="col-md-3">
                            <input name="diskon" type="number" placeholder="" class="form-control text-right"
                                onkeyup="totalBayar()">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-9 col-form-label text-right"><strong>Ongkir</strong> </label>
                        <div class="col-md-3">
                            <input name="ongkir" type="number" placeholder="" class="form-control text-right"
                                onkeyup="totalBayar()">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-9 col-form-label text-right"><strong>Total Bayar</strong></label>
                        <div class="col-md-3">
                            <input name="total_bayar" type="number" placeholder="" class="form-control text-right"
                                readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center" id="button_simpan">
                            <button type="button" class="btn btn-secondary" onclick="batal_transaksi()">
                                Cancel</button>
                            <button type="button" class="btn btn-primary" onclick="create_transaksi()">
                                Simpan</button>
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

    <!-- MODAL CETAK-->
    <div class="modal" id="modalCetak" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <h2 class="title-1"><strong>Cetak </strong> Transaksi</h2>
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-block">


                            <div class="card-body card-block">

                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label" ><strong>Cetak Semua Laporan</strong></label>
                                        <a class="au-btn au-btn-icon au-btn--green au-btn--small text-white col-md-12 text-center" href="/admin/transaksi/cetak_laporan">
                                            <i class="zmdi zmdi-print"></i>Cetak Semua</a>
                                    </div>

                                <form action="/admin/transaksi/cetak_pertanggal" method="get" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <label for="vat" class=" form-control-label" ><strong>Cetak Per Tanggal</strong></label>

                                <div class="form-group">
                                    <label for="vat" class=" form-control-label " >Tanggal awal</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar "></i>
                                        </div>
                                        <input name="tanggal_awal" class="form-control datepicker"  type="date" value="{{ date('Y-m-d') }}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label " >Tanggal Akhir</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar "></i>
                                        </div>
                                        <input  name="tanggal_akhir" class="form-control datepicker" id="date" name="date" placeholder="MM/DD/YYYY" type="date" value="{{ date('Y-m-d') }}"/>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn au-btn--green text-white">Cetak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL CETAK-->

    <script type="text/javascript">
        $(document).ready(function() {
            $('#form_tambah').hide();
            $('#form_edit').hide();
            $('#total').hide();
            $('#tabel_detail').hide();
            tabel_transaksi();
            datePicker();
            customers();
        });

        function datePicker() {
            $('[name=tgl]').datepicker({
                dateFormat: 'yy-mm-dd',
            });
        }

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
                    {
                        data: "id",
                        mRender: function(data) {
                            return `<div class="table-data-feature">
                                        <a class="item bg-success" href="/admin/transaksi/${data}/cetak_detail">
                                             <i class="zmdi zmdi-print text-white"></i>
                                        </a>
                                    </div>`;
                        }
                    },
                    {
                        data: "id",
                        mRender: function(data) {
                            return `<div class="table-data-feature">
                                        <a class="item bg-warning" onclick="edit_transaksi(${data})">
                                             <i class="zmdi zmdi-edit text-white"></i>
                                        </a>
                                        <a class="item bg-danger" onclick="hapus_transaksi(${data})">
                                             <i class="zmdi zmdi-delete text-white"></i>
                                        </a>
                                    </div>`;
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

        function tabel_detail(id) {
            $('#tabel_detail').DataTable({

                "ajax": {
                    "url": "http://127.0.0.1:8000/api/admin/transaksi/" + id + "/tabel_detail",
                    "dataSrc": ""
                },
                "columns": [{
                        data: "sales_id",
                        mRender: function(data) {
                            return `<div class="table-data-feature">
                                    <a class="item bg-warning" onclick="edit_barang(${data})">
                                         <i class="zmdi zmdi-edit text-white"></i>
                                    </a>
                                    <a class="item bg-danger" onclick="hapus_barang(${data})">
                                         <i class="zmdi zmdi-delete text-white"></i>
                                    </a>
                                </div>`;
                        }
                    },
                    {
                        data: null,
                        sortable: false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: "kode_barang",
                    },
                    {
                        data: "nama_barang"
                    },
                    {
                        data: "qty",
                    },
                    {
                        data: "harga_bandrol",
                        mRender: function(data) {
                            return `Rp. ${parseInt(data)}`;
                        }
                    },
                    {
                        data: "diskon_pct",
                        mRender: function(data) {
                            if (data == 0) {
                                return `-`;
                            } else {
                                return `${parseInt(data)}%`;
                            }
                        }
                    },
                    {
                        data: "diskon_nilai",
                        mRender: function(data) {
                            if (data == 0) {
                                return `-`;
                            } else {
                                return `Rp. ${parseInt(data)}`;
                            }
                        }
                    },
                    {
                        data: "harga_diskon",
                        mRender: function(data) {
                            return `Rp. ${parseInt(data)}`;
                        }
                    },
                    {
                        data: "total",
                        mRender: function(data) {
                            return `Rp. ${parseInt(data)}`;
                        }
                    },

                ]
            })
        }

        function transaksi_no() {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/transaksi/no_transaksi',
                type: 'GET',

                success: function(data) {
                    $('#form_tambah').find('[name=no_transaksi]').val(data);
                }
            });
        }

        function customers() {
            $('#form_tambah').find('[name=kode_customer]').empty('');
            $('#form_edit').find('[name=kode_customer]').empty('');
            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/transaksi/kode_customer',
                type: 'GET',

                success: function(data) {
                    $('#form_tambah').find('[name=kode_customer]').append(

                        '<option value="" >' + '<-- Silahkan Pilih Customer -->' + '</option>'
                    );
                    $('#form_edit').find('[name=kode_customer]').append(

                        '<option value="" >' + '<-- Silahkan Pilih Customer -->' + '</option>'
                    );

                    $.each(data, function(key, value) {
                        id_customer = data[key].id;
                        kode_customer = data[key].kode_customer;
                        $('#form_tambah').find('[name=kode_customer]').append(

                            '<option value=' + id_customer + '>' + kode_customer + '</option>'
                        );
                        $('#form_edit').find('[name=kode_customer]').append(

                            '<option value=' + id_customer + '>' + kode_customer + '</option>'
                        );
                    });

                }
            });
        }

        function data_customer() {
            a = $('#form_tambah').find('[name=kode_customer]').children("option:selected").val();
            b = $('#form_edit').find('[name=kode_customer]').children("option:selected").val();

            $('#form_tambah').find('[name=nama_customer]').val('');
            $('#form_tambah').find('[name=telp]').val('');
            $('#form_tambah').find('[name=alamat]').val('');

            $('#form_edit').find('[name=nama_customer]').val('');
            $('#form_edit').find('[name=telp]').val('');
            $('#form_edit').find('[name=alamat]').val('');

            if (id = a) {
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/admin/transaksi/' + id + '/data_customer',
                    type: 'GET',

                    success: function(data) {

                        $.each(data, function(key, value) {
                            id_customer = data[key].id;
                            kode_customer = data[key].kode_customer;
                            nama_customer = data[key].nama_customer;
                            telp = data[key].telp;
                            alamat = data[key].alamat;

                            $('#form_tambah').find('[name=nama_customer]').val(nama_customer);
                            $('#form_tambah').find('[name=telp]').val(telp);
                            $('#form_tambah').find('[name=alamat]').val(alamat);
                        });
                    }
                });
            };

            if (id = b) {
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/admin/transaksi/' + id + '/data_customer',
                    type: 'GET',

                    success: function(data) {

                        $.each(data, function(key, value) {
                            id_customer = data[key].id;
                            kode_customer = data[key].kode_customer;
                            nama_customer = data[key].nama_customer;
                            telp = data[key].telp;
                            alamat = data[key].alamat;

                            $('#form_edit').find('[name=nama_customer]').val(nama_customer);
                            $('#form_edit').find('[name=telp]').val(telp);
                            $('#form_edit').find('[name=alamat]').val(alamat);
                        });
                    }
                });
            };

        }

        function barang() {
            $('[name=kode_barang]').empty('');
            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/transaksi/kode_barang',
                type: 'GET',

                success: function(data) {
                    $('[name=kode_barang]').append(
                        '<option value="" >' + '<-- Silahkan Pilih Barang -->' + '</option>'
                    );
                    $.each(data, function(key, value) {
                        id_barang = data[key].id;
                        kode_barang = data[key].kode_barang;
                        $('[name=kode_barang]').append(

                            '<option value=' + id_barang + '>' + kode_barang + '</option>'
                        );
                    });

                }
            });
        }

        function data_barang() {
            a = $('#form_tambah').find('[name=kode_barang]').children("option:selected").val();
            b = $('#form_edit').find('[name=kode_barang]').children("option:selected").val();

            $('#form_tambah').find('[name=nama_barang]').val('');
            $('#form_tambah').find('[name=harga]').val('');

            $('#form_edit').find('[name=nama_barang]').val('');
            $('#form_edit').find('[name=harga]').val('');

            if (id = a) {
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/admin/transaksi/' + id + '/data_barang',
                    type: 'GET',

                    success: function(data) {

                        $.each(data, function(key, value) {
                            id_barang = data[key].id;
                            kode_barang = data[key].kode_barang;
                            nama_barang = data[key].nama_barang;
                            harga = data[key].harga;

                            $('#form_tambah').find('[name=nama_barang]').val(nama_barang);
                            $('#form_tambah').find('[name=harga]').val(harga);

                        });
                    }
                });
            };

            if (id = b) {
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/admin/transaksi/' + id + '/data_barang',
                    type: 'GET',

                    success: function(data) {

                        $.each(data, function(key, value) {
                            id_barang = data[key].id;
                            kode_barang = data[key].kode_barang;
                            nama_barang = data[key].nama_barang;
                            harga = data[key].harga;

                            $('#form_edit').find('[name=nama_barang]').val(nama_barang);
                            $('#form_edit').find('[name=harga]').val(harga);

                        });
                    }
                });
            };

        }

        function formTambah() {

            $('#form_tambah').show();
            $('#tambah_transaksi').hide();
            $('#tabel_transaksi').hide();

            $('#form_tambah').find('[name=tanggal]').val('');
            $('#form_tambah').find('[name=kode_customer]').val('');
            $('#form_tambah').find('[name=nama_customer]').val('');
            $('#form_tambah').find('[name=telp]').val('');
            $('#form_tambah').find('[name=alamat]').val('');
            $('#form_tambah').find('[name=kode_barang]').val('');
            $('#form_tambah').find('[name=nama_barang]').val('');
            $('#form_tambah').find('[name=harga]').val('');
            $('#form_tambah').find('[name=jumlah]').val('');
            $('#form_tambah').find('[name=diskon_pct]').val('');
            $('#form_tambah').find('[name=sub_total]').val('');
            $('#form_tambah').find('[name=diskon]').val('');
            $('#form_tambah').find('[name=ongkir]').val('');
            $('#form_tambah').find('[name=total_bayar]').val('');

            $('#form_tambah').find('#button').empty('');
            $('#form_tambah').find('#button').append(`
            <button type="button" class="btn btn-secondary" onclick="cancel()">
                Cancel</button>
            <button type="button" class="btn btn-primary" onclick="create_barang()">Buat
                Pesanan</button>`);
            $('#tabel_transaksi').DataTable().destroy();
            $('#tabel_detail').DataTable().destroy();
            transaksi_no();
            customers();
            barang();
        }

        function cancel() {
            $('#form_tambah').hide();
            $('#form_edit').hide();
            $('#total').hide();
            $('#tambah_transaksi').show();
            $('#tabel_detail').hide();
            $('#tabel_detail').DataTable().destroy();
            $('#tabel_transaksi').show();

            tabel_transaksi();
        }

        function batal_perubahan() {
            barang();
            $('[name=nama_barang]').val('');
            $('[name=harga]').val('');
            $('[name=jumlah]').val('');
            $('[name=diskon_pct]').val('');
            $('#button').empty('');
            $('#button').append(`
                    <button type="button" class="btn btn-primary" onclick="tambah_barang()">Tambah
                        Barang</button>`);

        }

        function batal_transaksi() {
            var no_transaksi = $('[name=no_transaksi]').val();

            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/transaksi/' + no_transaksi + '/batal_transaksi',
                type: 'GET',
                success: function(data) {
                    cancel();

                }
            })
        }

        function create_barang() {
            var no_transaksi = $('[name=no_transaksi]').val();
            var tanggal = $('[name=tgl]').val();
            var kode_customer = $('[name=kode_customer]').val();
            var sub_total = $('[name=sub_total]').val();
            var diskon = $('[name=diskon]').val();
            var ongkir = $('[name=ongkir]').val();
            var total_bayar = $('[name=total_bayar]').val();
            var kode_barang = $('[name=kode_barang]').val();
            var harga = $('[name=harga]').val();
            var jumlah = $('[name=jumlah]').val();
            var diskon_pct = $('[name=diskon_pct]').val();

            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/transaksi/create_barang',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    kode_transaksi: no_transaksi,
                    tgl: tanggal,
                    cust_id: kode_customer,
                    subtotal: sub_total,
                    diskon: diskon,
                    ongkir: ongkir,
                    total_bayar: total_bayar,
                    barang_id: kode_barang,
                    harga_bandrol: harga,
                    qty: jumlah,
                    diskon_pct: diskon_pct,
                },
                success: function(data) {

                    toastr.success("Data Berhasil DI Tambahkan...!!!", "Sucesss", {
                        positionClass: "toast-bottom-right",
                        timeOut: 5e3,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1,
                    });
                    $('#tabel_detail').show();
                    $('#tabel_detail').DataTable().destroy();
                    tabel_detail(no_transaksi);
                    $('#button').empty('');
                    $('#button').append(`
                    <button type="button" class="btn btn-primary" onclick="tambah_barang()">Tambah
                        Barang</button>`);
                    $('#total').show();
                    barang();
                    subTotal();
                    $('[name=nama_barang]').val('');
                    $('[name=harga]').val('');
                    $('[name=jumlah]').val('');
                    $('[name=diskon_pct]').val('');

                },
                error: function(request, status, error) {

                    $("#exampleModal").modal('hide');
                    toastr.error("Data Tidak Berhasil Di Tambahkan", "Error", {
                        positionClass: "toast-bottom-right",
                        timeOut: 5e3,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1,
                    });
                }
            });
        }

        function tambah_barang() {
            var a = $('#form_tambah').find('[name=no_transaksi]').val();
            var b = $('#form_edit').find('[name=no_transaksi]').val();

            if (a) {

                var kode_barang = $('#form_tambah').find('[name=kode_barang]').val();
                var harga = $('#form_tambah').find('[name=harga]').val();
                var jumlah = $('#form_tambah').find('[name=jumlah]').val();
                var diskon_pct = $('#form_tambah').find('[name=diskon_pct]').val();

                $.ajax({
                    url: 'http://127.0.0.1:8000/api/admin/transaksi/tambah_barang',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        kode_transaksi: a,
                        barang_id: kode_barang,
                        harga_bandrol: harga,
                        qty: jumlah,
                        diskon_pct: diskon_pct,
                    },
                    success: function(data) {

                        toastr.success("Data Berhasil DI Tambahkan...!!!", "Sucesss", {
                            positionClass: "toast-bottom-right",
                            timeOut: 5e3,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1,
                        });
                        $('#tabel_detail').DataTable().destroy();
                        tabel_detail(a);
                        barang();
                        subTotal();
                        $('#form_tambah').find('[name=nama_barang]').val('');
                        $('#form_tambah').find('[name=harga]').val('');
                        $('#form_tambah').find('[name=jumlah]').val('');
                        $('#form_tambah').find('[name=diskon_pct]').val('');
                    },
                    error: function(request, status, error) {

                        $("#exampleModal").modal('hide');
                        toastr.error("Data Tidak Berhasil Di Tambahkan", "Error", {
                            positionClass: "toast-bottom-right",
                            timeOut: 5e3,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1,
                        });
                    }
                });
            };

            if (b) {

                var kode_barang = $('#form_edit').find('[name=kode_barang]').val();
                var harga = $('#form_edit').find('[name=harga]').val();
                var jumlah = $('#form_edit').find('[name=jumlah]').val();
                var diskon_pct = $('#form_edit').find('[name=diskon_pct]').val();

                $.ajax({
                    url: 'http://127.0.0.1:8000/api/admin/transaksi/tambah_barang',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        kode_transaksi: b,
                        barang_id: kode_barang,
                        harga_bandrol: harga,
                        qty: jumlah,
                        diskon_pct: diskon_pct,
                    },
                    success: function(data) {

                        toastr.success("Data Berhasil DI Tambahkan...!!!", "Sucesss", {
                            positionClass: "toast-bottom-right",
                            timeOut: 5e3,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1,
                        });
                        $('#tabel_detail').DataTable().destroy();
                        tabel_detail(b);
                        barang();
                        subTotal();
                        $('#form_edit').find('[name=nama_barang]').val('');
                        $('#form_edit').find('[name=harga]').val('');
                        $('#form_edit').find('[name=jumlah]').val('');
                        $('#form_edit').find('[name=diskon_pct]').val('');
                    },
                    error: function(request, status, error) {

                        $("#exampleModal").modal('hide');
                        toastr.error("Data Tidak Berhasil Di Tambahkan", "Error", {
                            positionClass: "toast-bottom-right",
                            timeOut: 5e3,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1,
                        });
                    }
                });
            };

        }

        function edit_barang(id) {

            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/transaksi/' + id + '/edit_barang',
                type: 'GET',

                success: function(data) {
                    $.each(data, function(key, value) {
                        kode_barang = data[key].barang_id;
                        nama_barang = data[key].nama_barang;
                        harga = data[key].harga_bandrol;
                        jumlah = data[key].qty;
                        diskon_pct = data[key].diskon_pct;

                        $('[name=kode_barang]').val(kode_barang);
                        $('[name=nama_barang]').val(nama_barang);
                        $('[name=harga]').val(harga);
                        $('[name=jumlah]').val(jumlah);
                        $('[name=diskon_pct]').val(parseInt(diskon_pct));
                    });
                    $('#form_tambah').find('#button').empty('');
                    $('#form_tambah').find('#button').append(`<button type="button" class="btn btn-secondary" onclick="batal_perubahan()">
                        Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="update_barang(${id})">Simpan Perubahan
                        </button>`);
                    $('#form_edit').find('#button').empty('');
                    $('#form_edit').find('#button').append(`<button type="button" class="btn btn-secondary" onclick="batal_perubahan()">
                            Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="update_barang(${id})">Simpan Perubahan
                            </button>`);
                    $('#total').show();
                }
            });
        }

        function edit_transaksi(id) {
            barang();
            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/transaksi/' + id + '/edit_transaksi',
                type: 'GET',

                success: function(data) {
                    $('#form_edit').show();
                    $('#tambah_transaksi').hide();
                    $('#tabel_transaksi').hide();
                    $('#form_edit').find('[name=nama_barang]').val('');
                    $('#form_edit').find('[name=harga]').val('');
                    $('#form_edit').find('#button').empty('');
                    $('#form_edit').find('#button').append(`
            <button type="button" class="btn btn-primary" onclick="tambah_barang()">Tambah
                Barang</button>`);
                    $('#tabel_transaksi').DataTable().destroy();

                    $('#total').show();

                    $.each(data, function(key, value) {
                        no_transaksi = data[key].kode_transaksi;
                        tgl = data[key].tgl;
                        kode_customer = data[key].cust_id;
                        nama_customer = data[key].nama_customer;
                        telp = data[key].telp;
                        alamat = data[key].alamat;
                        subtotal = data[key].subtotal;
                        diskon = data[key].diskon;
                        ongkir = data[key].ongkir;
                        total_bayar = data[key].total_bayar;


                        $('#form_edit').find('[name=no_transaksi]').val(no_transaksi);
                        $('#form_edit').find('[name=tgl]').val(tgl);
                        $('#form_edit').find('[name=kode_customer]').val(kode_customer);
                        $('#form_edit').find('[name=nama_customer]').val(nama_customer);
                        $('#form_edit').find('[name=telp]').val(telp);
                        $('#form_edit').find('[name=alamat]').val(alamat);
                        $('[name=diskon]').val(parseInt(diskon));
                        $('[name=ongkir]').val(parseInt(ongkir));
                        $('#tabel_detail').show();
                        $('#tabel_detail').DataTable().destroy();
                        tabel_detail(no_transaksi);
                        $('#total').find('#button_simpan').empty('');
                        $('#total').find('#button_simpan').append(`<button type="button" class="btn btn-secondary" onclick="cancel()">
                        Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="create_transaksi(${id})">Simpan Perubahan
                        </button>`);
                        subTotal();
                    });


                }
            });
        }

        function update_barang(id) {
            var a = $('#form_tambah').find('[name=no_transaksi]').val();
            var b = $('#form_edit').find('[name=no_transaksi]').val();

            if (a) {
                var kode_barang = $('#form_tambah').find('[name=kode_barang]').val();
                var harga = $('#form_tambah').find('[name=harga]').val();
                var jumlah = $('#form_tambah').find('[name=jumlah]').val();
                var diskon_pct = $('#form_tambah').find('[name=diskon_pct]').val();

                $.ajax({
                    url: 'http://127.0.0.1:8000/api/admin/transaksi/' + id + '/update_barang',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        barang_id: kode_barang,
                        harga_bandrol: harga,
                        qty: jumlah,
                        diskon_pct: diskon_pct,
                    },
                    success: function(data) {
                        toastr.success("Data Berhasil DI Ubah...!!!", "Sucesss", {
                            positionClass: "toast-bottom-right",
                            timeOut: 5e3,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1,
                        });
                        $('#tabel_detail').DataTable().destroy();
                        tabel_detail(a);
                        barang();
                        subTotal();
                        $('#form_tambah').find('[name=nama_barang]').val('');
                        $('#form_tambah').find('[name=harga]').val('');
                        $('#form_tambah').find('[name=jumlah]').val('');
                        $('#form_tambah').find('[name=diskon_pct]').val('');
                        $('#form_tambah').find('#button').empty('');
                        $('#form_tambah').find('#button').append(`<button type="button" class="btn btn-secondary" onclick="">
                        Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="tambah_barang()">Tambah
                        Barang</button>`);
                    },
                    error: function(request, status, error) {
                        toastr.error("Data Tidak Berhasil Di Ubah", "Error", {
                            positionClass: "toast-bottom-right",
                            timeOut: 5e3,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1,
                        });
                    }
                });
            };

            if (b) {
                var kode_barang = $('#form_edit').find('[name=kode_barang]').val();
                var harga = $('#form_edit').find('[name=harga]').val();
                var jumlah = $('#form_edit').find('[name=jumlah]').val();
                var diskon_pct = $('#form_edit').find('[name=diskon_pct]').val();

                $.ajax({
                    url: 'http://127.0.0.1:8000/api/admin/transaksi/' + id + '/update_barang',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        barang_id: kode_barang,
                        harga_bandrol: harga,
                        qty: jumlah,
                        diskon_pct: diskon_pct,
                    },
                    success: function(data) {
                        toastr.success("Data Berhasil DI Ubah...!!!", "Sucesss", {
                            positionClass: "toast-bottom-right",
                            timeOut: 5e3,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1,
                        });
                        $('#tabel_detail').DataTable().destroy();
                        tabel_detail(b);
                        barang();
                        subTotal();
                        $('#form_edit').find('[name=nama_barang]').val('');
                        $('#form_edit').find('[name=harga]').val('');
                        $('#form_edit').find('[name=jumlah]').val('');
                        $('#form_edit').find('[name=diskon_pct]').val('');
                        $('#form_edit').find('#button').empty('');
                        $('#form_edit').find('#button').append(`<button type="button" class="btn btn-secondary" onclick="">
                        Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="tambah_barang()">Tambah
                        Barang</button>`);
                    },
                    error: function(request, status, error) {
                        toastr.error("Data Tidak Berhasil Di Ubah", "Error", {
                            positionClass: "toast-bottom-right",
                            timeOut: 5e3,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1,
                        });
                    }
                });
            };
        }

        function hapus_barang(id) {
            var a = $('#form_tambah').find('[name=no_transaksi]').val();
            var b = $('#form_edit').find('[name=no_transaksi]').val();

            if (a) {
                Swal.fire({
                    title: 'Apakah kamu yakin ingin menghapus data ini?',
                    text: "Data Yang telah dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Delete',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'http://127.0.0.1:8000/api/admin/transaksi/' + id + '/delete_barang',
                            type: 'GET',
                            success: function(data) {
                                Swal.fire(
                                    'Delete!',
                                    'Data telah berhasil dihapus',
                                    'success'
                                )
                            }
                        })
                        $('#tabel_detail').DataTable().destroy();
                        tabel_detail(a);
                        subTotal();
                    }
                })
            };

            if (b) {
                Swal.fire({
                    title: 'Apakah kamu yakin ingin menghapus data ini?',
                    text: "Data Yang telah dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Delete',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'http://127.0.0.1:8000/api/admin/transaksi/' + id + '/delete_barang',
                            type: 'GET',
                            success: function(data) {
                                Swal.fire(
                                    'Delete!',
                                    'Data telah berhasil dihapus',
                                    'success'
                                )
                            }
                        })
                        $('#tabel_detail').DataTable().destroy();
                        tabel_detail(b);
                        subTotal();
                    }
                })
            };
        }

        function subTotal() {
            var a = $('#form_tambah').find('[name=no_transaksi]').val();
            var b = $('#form_edit').find('[name=no_transaksi]').val();

            if (a) {

                $.ajax({
                    url: 'http://127.0.0.1:8000/api/admin/transaksi/total',
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        kode_transaksi: a,
                    },

                    success: function(data) {
                        $('[name=sub_total]').val(parseInt(data));
                        $('[name=diskon]').val('0');
                        $('[name=ongkir]').val('0');
                        totalBayar();
                    }
                });
            };

            if (b) {
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/admin/transaksi/total',
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        kode_transaksi: b,
                    },

                    success: function(data) {
                        $('[name=sub_total]').val(parseInt(data));

                        totalBayar();
                    }
                });
            };

        }

        function totalBayar() {
            var sub_total = $('[name=sub_total]').val();
            var diskon = $('[name=diskon]').val();
            var ongkir = $('[name=ongkir]').val();

            var total_bayar = (parseInt(sub_total) - parseInt(diskon)) + parseInt(ongkir);
            $('[name=total_bayar]').val(total_bayar);
        }

        function create_transaksi() {

            var a = $('#form_tambah').find('[name=no_transaksi]').val();
            var b = $('#form_edit').find('[name=no_transaksi]').val();

            if (a) {
                var tanggal = $('#form_tambah').find('[name=tgl]').val();
                var kode_customer = $('#form_tambah').find('[name=kode_customer]').val();
                var sub_total = $('[name=sub_total]').val();
                var diskon = $('[name=diskon]').val();
                var ongkir = $('[name=ongkir]').val();
                var total_bayar = $('[name=total_bayar]').val();

                $.ajax({
                    url: 'http://127.0.0.1:8000/api/admin/transaksi/' + a + '/create_transaksi',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        tgl:tanggal,
                        cust_id: kode_customer,
                        subtotal: sub_total,
                        diskon: diskon,
                        ongkir: ongkir,
                        total_bayar: total_bayar,
                    },
                    success: function(data) {
                        toastr.success("Data Berhasil DI Tambahkan...!!!", "Sucesss", {
                            positionClass: "toast-bottom-right",
                            timeOut: 5e3,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1,
                        });

                        $('#tabel_detail').DataTable().destroy();
                        $('#tabel_detail').hide();
                        $('#tabel_transaksi').DataTable().destroy();
                        tabel_transaksi();
                        $('#tabel_transaksi').show();
                        $('#form_tambah').hide();
                        $('#total').hide();
                        $('#tambah_transaksi').show();

                    },
                    error: function(request, status, error) {

                        $("#exampleModal").modal('hide');
                        toastr.error("Data Tidak Berhasil Di Tambahkan", "Error", {
                            positionClass: "toast-bottom-right",
                            timeOut: 5e3,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1,
                        });
                    }
                });
            };

            if (b) {
                var tanggal = $('#form_edit').find('[name=tgl]').val();
                var kode_customer = $('#form_edit').find('[name=kode_customer]').val();
                var sub_total = $('[name=sub_total]').val();
                var diskon = $('[name=diskon]').val();
                var ongkir = $('[name=ongkir]').val();
                var total_bayar = $('[name=total_bayar]').val();

                $.ajax({
                    url: 'http://127.0.0.1:8000/api/admin/transaksi/' + b + '/create_transaksi',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        tgl:tanggal,
                        cust_id: kode_customer,
                        subtotal: sub_total,
                        diskon: diskon,
                        ongkir: ongkir,
                        total_bayar: total_bayar,
                    },
                    success: function(data) {

                        toastr.success("Data Berhasil DI Tambahkan...!!!", "Sucesss", {
                            positionClass: "toast-bottom-right",
                            timeOut: 5e3,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1,
                        });

                        $('#tabel_detail').DataTable().destroy();
                        $('#tabel_detail').hide();
                        $('#tabel_transaksi').DataTable().destroy();
                        tabel_transaksi();
                        $('#tabel_transaksi').show();
                        $('#form_edit').hide();
                        $('#total').hide();
                        $('#tambah_transaksi').show();

                    },
                    error: function(request, status, error) {

                        $("#exampleModal").modal('hide');
                        toastr.error("Data Tidak Berhasil Di Tambahkan", "Error", {
                            positionClass: "toast-bottom-right",
                            timeOut: 5e3,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1,
                        });
                    }
                });
            };
        }

        function hapus_transaksi(id) {

            Swal.fire({
                title: 'Apakah kamu yakin ingin menghapus data ini?',
                text: "Data Yang telah dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'http://127.0.0.1:8000/api/admin/transaksi/' + id + '/delete_transaksi',
                        type: 'GET',
                        success: function(data) {
                            Swal.fire(
                                'Delete!',
                                'Data telah berhasil dihapus',
                                'success'
                            )
                        }
                    })
                    $('#tabel_transaksi').DataTable().destroy();
                    tabel_transaksi();
                }
            })
        }


    </script>
@endsection
