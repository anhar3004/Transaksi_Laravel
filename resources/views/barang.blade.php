@extends('layouts.main')

@section('title', 'Data Barang')

@include('layouts.header')

@include('layouts.sidebar')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h1 class="title-1 fw-bold"><strong>Data Barang</strong></h1>
                    </div>
                    <hr style="height:10px;border:none;color:#333;background-color:#333;" />
                    <div class=" table-data__tool">
                        <div class=" table-data__tool-right">
                            <button class="au-btn au-btn-icon au-btn--blue au-btn--small" onclick="formTambah()">
                                <i class="zmdi zmdi-plus"></i>Tambah Barang</button>
                            <a class="au-btn au-btn-icon au-btn--green au-btn--small text-white" href="/admin/barang/cetak_laporan">
                                <i class="zmdi zmdi-print"></i>Cetak Laporan</a>
                        </div>
                    </div>
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-hover table-earning" id="tabel_barang">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
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
                                    <label for="vat" class=" form-control-label">Kode Barang</label>
                                    <input name="kode_barang" type="text" id="vat" placeholder=""
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Nama Barang</label>
                                    <input name="nama_barang" type="text" id="vat" placeholder=""
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Harga</label>
                                    <input name="harga" type="number" id="vat" placeholder="" class="form-control">
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
                        <h2 class="title-1"><strong>Edit</strong> Data Barang</h2>
                    </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"
                        onclick="closeModal()"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body card-block">
                        <form method="post" class="form-horizontal">
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Kode Barang</label>
                                    <input name="kode_barang" type="text" id="vat" placeholder=""
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Nama Barang</label>
                                    <input name="nama_barang" type="text" id="vat" placeholder=""
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Harga</label>
                                    <input name="harga" type="number" id="vat" placeholder=""
                                        class="form-control">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    onclick="closeModal()">Close</button>
                                <button type="button" class="btn btn-primary"
                                    onclick="update(id_barang)">Simpan</button>
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
            tabel_barang();

        });

        function tabel_barang() {
            $('#tabel_barang').DataTable({

                "ajax": {
                    "url": "http://127.0.0.1:8000/api/admin/barang/tabel_barang",
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
                        data: "kode_barang",
                    },
                    {
                        data: "nama_barang"
                    },
                    {
                        data: "harga",
                        mRender: function(data) {
                            return ` <td>Rp. ${ parseInt(data)} </td>`;

                        }
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
                url: 'http://127.0.0.1:8000/api/admin/barang/kode_barang',
                type: 'GET',

                success: function(data) {
                    $('[name=kode_barang]').val(data);
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
            var kode_barang = $('[name=kode_barang]').val();
            var nama_barang = $('[name=nama_barang]').val();
            var harga = $('[name=harga]').val();

            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/barang/create',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    kode_barang: kode_barang,
                    nama_barang: nama_barang,
                    harga: harga,
                },
                success: function(data) {

                    $("#modalTambah").modal('hide');
                    $('[name=nama_barang]').val("");
                    $('[name=harga]').val("");

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
                    $('#tabel_barang').DataTable().destroy();
                    tabel_barang();

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
                url: 'http://127.0.0.1:8000/api/admin/barang/' + id + '/edit',
                type: 'GET',

                success: function(data) {
                    $("#modalEdit").modal('show');

                    $.each(data, function(key, value) {
                        id_barang = data[key].id;
                        kode_barang = data[key].kode_barang;
                        nama_barang = data[key].nama_barang;
                        harga = data[key].harga;

                        $('#modalEdit').find('[name=kode_barang]').val(kode_barang);
                        $('#modalEdit').find('[name=nama_barang]').val(nama_barang);
                        $('#modalEdit').find('[name=harga]').val(parseInt(harga));
                    });
                }
            });
        }

        function update(id) {
            var kode_barang = $('#modalEdit').find('[name=kode_barang]').val();
            var nama_barang = $('#modalEdit').find('[name=nama_barang]').val();
            var harga = $('#modalEdit').find('[name=harga]').val();

            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/barang/' + id + '/update',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    kode_barang: kode_barang,
                    nama_barang: nama_barang,
                    harga: harga,

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
                    $('#tabel_barang').DataTable().destroy();
                    tabel_barang();
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
                        url: 'http://127.0.0.1:8000/api/admin/barang/' + id +
                            '/delete',
                        type: 'GET',
                        success: function(data) {
                            Swal.fire(
                                'Delete!',
                                'Data telah berhasil dihapus',
                                'success'
                            )
                        }
                    })
                    $('#tabel_barang').DataTable().destroy();
                    tabel_barang();
                }
            })
        }
    </script>
@endsection
