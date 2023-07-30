@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/toastify-js/src/toastify.css">
@endpush

@section('content')
    @include('admin.sidebar')
    <main id="main" class="main">
        <input type="hidden" id="produksi_id" value="{{$produksi_id}}">
        <div class="pagetitle">
            <h1>{{$title}}</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-3">
                    <div class="list-group">
                        <a href="{{Session::get('base_url')}}/biaya_bahan_baku/{{$produksi_id}}" class="list-group-item list-group-item-action">Biaya Bahan Baku </a>
                        <a href="{{Session::get('base_url')}}/biaya_bahan_penolong/{{$produksi_id}}" class="list-group-item list-group-item-action">Biaya Bahan Penolong</a>
                        <a href="{{Session::get('base_url')}}/biaya_tenaga_kerja_langsung/{{$produksi_id}}" class="list-group-item list-group-item-action">Biaya Tenaga Kerja Langsung</a>
                        <a href="{{Session::get('base_url')}}/biaya_tenaga_kerja_tidak_langsung/{{$produksi_id}}" class="list-group-item list-group-item-action">Biaya Tenaga Kerja Tidak Langsung</a>
                        <a href="{{Session::get('base_url')}}/biaya_overhead_tetap/{{$produksi_id}}" class="list-group-item list-group-item-action">Biaya Overhead Tetap</a>
                        <a href="{{Session::get('base_url')}}/biaya_overhead_variabel/{{$produksi_id}}" class="list-group-item list-group-item-action active" aria-current="true">
                            Biaya Overhead Variabel
                        </a>
                        <a href="{{Session::get('base_url')}}/produksi/{{$produksi_id}}" class="list-group-item list-group-item-action">Laporan Biaya Produksi</a>
                      </div>
                </div>
                <div class="col-lg-9">

                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                                    Tambah Data
                                </button>

                                <!-- Add -->
                                <div class="modal fade" id="add" tabindex="-1" aria-labelledby="" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="">Tambah Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="forminput">

                                                    <div class="mb-3">
                                                        <label class="form-label">Overhead</label>
                                                        <input type="text" class="form-control" id="overhead"
                                                            name="overhead" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Subtotal</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rp</span>
                                                            <input type="number" class="form-control" id="total"
                                                            name="total" required>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit -->
                                <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="">Ubah Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="formupdate">
                                                    <input type="hidden" id="editid" value="">
                                                    <div class="mb-3">
                                                        <label class="form-label">Overhead</label>
                                                        <input type="text" class="form-control" id="editoverhead"
                                                            name="overhead" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Subtotal</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rp</span>
                                                            <input type="number" class="form-control" id="edittotal"
                                                            name="total" required>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div id="load_table">
                                <h1 class="text-center">
                                    <i class="fa-solid fa-circle-notch fa-spin"></i>
                                </h1>
                            </div>

                            <div id="table"></div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection

@push('script')
    <script src="{{ url('') }}/assets/vendor/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/toastify-js/src/toastify.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.colVis.min.js"></script>

    <script>
         function loadtable() {
            $('#load_table').show();
            var id = $('#produksi_id').val();
            setTimeout(() => {
                $('#table').load('../table_biaya_overhead_variabel/'+id, function() {
                    $('#load_table').hide();
                });
            }, 500);
        }
        loadtable();

        function editdata(value) {
            $('#editoverhead').val('');
            $('#edittotal').val('');
            setTimeout(() => {
                $.get('{{ url('') }}/api/biaya_overhead_variabel/show/' + value, function(data,
                    status) {
                    if (data.error == false) {
                        $('#editid').val(value);
                        $('#editoverhead').val(data.result.overhead);
                        $('#edittotal').val(data.result.total);
                    }
                });
            }, 100);
        }


        $(document).ready(function() {

            $('#forminput').on('submit', function(e) {

                e.preventDefault();

                var id = $('#produksi_id').val();
                var datas = $("#forminput").serialize();

                $.ajax({
                    type: "POST",
                    url: "{{ url('') }}/api/biaya_overhead_variabel/create/"+id,
                    dataType: "json",
                    data: datas
                }).done(function(data) {
                    if (data.error == false) {
                        Toastify({
                            text: "Berhasil ditambahkan",
                            duration: 3000,
                            close: true,
                            backgroundColor: "#198754",
                        }).showToast()
                        loadtable();
                    } else {
                        Toastify({
                            text: "Gagal ditambahkan",
                            duration: 3000,
                            close: true,
                            backgroundColor: "#dc3545",
                        }).showToast()
                    }
                    $('#add').modal('hide')
                    document.getElementById("forminput").reset();
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    Toastify({
                            text: "Error",
                            duration: 3000,
                            close: true,
                            backgroundColor: "#dc3545",
                        }).showToast()
                    $('#add').modal('hide')
                    document.getElementById("forminput").reset();
                })
            });

            $('#formupdate').on('submit', function(e) {

                e.preventDefault();

                var id = $('#editid').val();
                var datas = $("#formupdate").serialize();

                $.ajax({
                    type: "POST",
                    url: "{{ url('') }}/api/biaya_overhead_variabel/update/"+id,
                    dataType: "json",
                    data: datas
                }).done(function(data) {
                    if (data.error == false) {
                        Toastify({
                            text: "Berhasil diubah",
                            duration: 3000,
                            close: true,
                            backgroundColor: "#198754",
                        }).showToast()
                        loadtable();
                    } else {
                        Toastify({
                            text: "Gagal diubah",
                            duration: 3000,
                            close: true,
                            backgroundColor: "#dc3545",
                        }).showToast()
                    }
                    $('#edit').modal('hide')
                    document.getElementById("formupdate").reset();
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    Toastify({
                            text: "Error",
                            duration: 3000,
                            close: true,
                            backgroundColor: "#dc3545",
                        }).showToast()
                    $('#edit').modal('hide')
                    document.getElementById("formupdate").reset();
                })
            });

        });

        function deletedata(value) {
            Swal.fire({
                title: "Perhatian!!",
                text: "Apakah Anda Yakin ingin menghapusnya??",
                icon: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        dataType: "json",
                        url: "{{ url('') }}/api/biaya_overhead_variabel/delete/" + value
                    }).done(function(data) {
                        if (data.error == false) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil dihapus',
                                timer: 1500
                            });
                            loadtable();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal dihapus',
                                timer: 1500
                            });
                        }
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                timer: 1500
                            });
                    })
                }

            });
        }
    </script>
@endpush
