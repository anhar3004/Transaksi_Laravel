@extends('layouts.main')

@section('title', 'Data Customer')

@include('layouts.header')

@include('layouts.sidebar')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h1 class="title-1 fw-bold"><strong>Data Customer</strong></h1>
                    </div>
                    <hr style="height:10px;border:none;color:#333;background-color:#333;" />
                    <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            <button class="au-btn au-btn-icon au-btn--blue au-btn--small" data-toggle="modal"
                                onclick="formTambah()">
                                <i class="zmdi zmdi-plus"></i>Tambah Customer</button>
                                <a class="au-btn au-btn-icon au-btn--green au-btn--small text-white" href="/admin/customer/cetak_laporan">
                                    <i class="zmdi zmdi-print"></i>Cetak Laporan</a>
                        </div>
                    </div>
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-hover table-earning" id="tabel_customer">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Customer</th>
                                    <th>Nama Customer</th>
                                    <th>Telpon</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
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

    <!-- MODAL TAMBAH-->
    <div class="modal" id="modalTambah" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <h2 class="title-1"><strong>Tambah</strong> Data Barang</h2>
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"
                        onclick="closeModal()"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-block">
                        <form method="post" class="form-horizontal">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Kode Customer</label>
                                    <input name="kode_customer" type="text" id="vat" placeholder=""
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Nama Customer</label>
                                    <input name="nama_customer" type="text" id="vat" placeholder=""
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Telpon</label>
                                    <input name="telp" type="number" id="vat" placeholder="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Alamat</label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="alamat" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    onclick="closeModal()">Close</button>
                                <button type="button" class="btn btn-primary" onclick="create()">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL TAMBAH-->

    <!-- MODAL Edit-->
    <div class="modal" id="modalEdit" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <h2 class="title-1"><strong>Edit</strong> Data Customer</h2>
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"
                        onclick="closeModal()"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-block">
                        <form method="post" class="form-horizontal">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Kode Customer</label>
                                    <input name="kode_customer" type="text" id="vat" placeholder=""
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Nama Customer</label>
                                    <input name="nama_customer" type="text" id="vat" placeholder=""
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Telp</label>
                                    <input name="telp" type="number" id="vat" placeholder="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Alamat</label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="alamat" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    onclick="closeModal()">Close</button>
                                <button type="button" class="btn btn-primary" onclick="update(id_customer)">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL Edit-->
    <script type="text/javascript">
        $(document).ready(function() {
            tabel_customer();
        });

        function tabel_customer() {
            $('#tabel_customer').DataTable({

                "ajax": {
                    "url": "http://127.0.0.1:8000/api/admin/customer/tabel_customer",
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
                        data: "kode_customer",
                    },
                    {
                        data: "nama_customer"
                    },
                    {
                        data: "telp",
                    },
                    {
                        data: "alamat",
                    },
                    {
                        data: "id",
                        mRender: function(data) {
                            return `<div class="table-data-feature">
                                        <a class="item bg-warning" onclick="formEdit(${data})">
                                             <i class="zmdi zmdi-edit text-white"></i>
                                        </a>
                                        <a class="item bg-danger" onclick="hapus(${data})">
                                             <i class="zmdi zmdi-delete text-white"></i>
                                        </a>
                                    </div>`;
                        }
                    },
                ]
            })
        }

        function kode() {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/customer/kode_customer',
                type: 'GET',

                success: function(data) {
                    $('[name=kode_customer]').val(data);
                }
            });
        }

        function formTambah() {
            kode();
            $("#modalTambah").modal('show');
        }

        function closeModal() {
            $("#modalEdit").modal('hide');
            $("#modalTambah").modal('hide');
        }

        function create() {
            var kode_customer = $('[name=kode_customer]').val();
            var nama_customer = $('[name=nama_customer]').val();
            var telp = $('[name=telp]').val();
            var alamat = $('[name=alamat]').val();

            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/customer/create',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    kode_customer: kode_customer,
                    nama_customer: nama_customer,
                    telp: telp,
                    alamat: alamat,
                },
                success: function(data) {

                    $("#modalTambah").modal('hide');
                    $('[name=nama_customer]').val("");
                    $('[name=telp]').val("");
                    $('[name=alamat]').val("");

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
                    $('#tabel_customer').DataTable().destroy();
                    tabel_customer();

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

        function formEdit(id) {

            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/customer/' + id + '/edit',
                type: 'GET',

                success: function(data) {
                    $("#modalEdit").modal('show');

                    $.each(data, function(key, value) {
                        id_customer = data[key].id;
                        kode_customer = data[key].kode_customer;
                        nama_customer = data[key].nama_customer;
                        telp = data[key].telp;
                        alamat = data[key].alamat;

                        $('#modalEdit').find('[name=kode_customer]').val(kode_customer);
                        $('#modalEdit').find('[name=nama_customer]').val(nama_customer);
                        $('#modalEdit').find('[name=telp]').val(telp);
                        $('#modalEdit').find('[name=alamat]').val(alamat);
                    });
                }
            });
        }

        function update(id) {
            var kode_customer = $('#modalEdit').find('[name=kode_customer]').val();
            var nama_customer = $('#modalEdit').find('[name=nama_customer]').val();
            var telp = $('#modalEdit').find('[name=telp]').val();
            var alamat = $('#modalEdit').find('[name=alamat]').val();

            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/customer/' + id + '/update',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    kode_customer: kode_customer,
                    nama_customer: nama_customer,
                    telp: telp,
                    alamat: alamat,
                },
                success: function(data) {

                    $("#modalEdit").modal('hide');
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
                    $('#tabel_customer').DataTable().destroy();
                    tabel_customer();

                },
                error: function(request, status, error) {

                    $("#exampleModal").modal('hide');
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
        }

        function hapus(id) {
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
                        url: 'http://127.0.0.1:8000/api/admin/customer/' + id + '/delete',
                        type: 'GET',
                        success: function(data) {
                            Swal.fire(
                                'Delete!',
                                'Data telah berhasil dihapus',
                                'success'
                            )
                        }
                    })
                    $('#tabel_customer').DataTable().destroy();
                    tabel_customer();
                }
            })
        }


    </script>
@endsection
