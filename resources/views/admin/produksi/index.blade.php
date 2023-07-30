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

        <div class="pagetitle">
            <h1>{{$title}}</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

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
                                                        <label class="form-label">Pelanggan</label>
                                                        <select class="form-select" id="pelanggan_id" name="pelanggan_id"
                                                            data-placeholder="Pilih Pelanggan">
                                                            <option value="" disabled selected>Pilih Pelanggan</option>
                                                            @foreach ($pelanggan as $item)
                                                                <option value="{{ $item->id }}">{{ $item->nama_pelanggan }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Produk</label>
                                                        <select class="form-select" id="produk_id" name="produk_id"
                                                            data-placeholder="Pilih Produk">
                                                            <option value="" disabled selected>Pilih Produk</option>
                                                            @foreach ($produk as $item)
                                                                <option value="{{ $item->id }}">{{ $item->nama_produk }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Jumlah</label>
                                                        <input type="number" class="form-control" id="jumlah"
                                                            name="jumlah" required>
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
                                                        <label class="form-label">Pelanggan</label>
                                                        <select class="form-select" id="editpelanggan_id" name="pelanggan_id"
                                                            data-placeholder="Pilih Pelanggan">
                                                            <option value="" disabled selected>Pilih Pelanggan</option>
                                                            @foreach ($pelanggan as $item)
                                                                <option value="{{ $item->id }}">{{ $item->nama_pelanggan }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Produk</label>
                                                        <select class="form-select" id="editproduk_id" name="produk_id"
                                                            data-placeholder="Pilih Produk">
                                                            <option value="" disabled selected>Pilih Produk</option>
                                                            @foreach ($produk as $item)
                                                                <option value="{{ $item->id }}">{{ $item->nama_produk }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Jumlah</label>
                                                        <input type="number" class="form-control" id="editjumlah"
                                                            name="jumlah" required>
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
            setTimeout(() => {
                $('#table').load('./table_produksi', function() {
                    $('#load_table').hide();
                });
            }, 500);
        }
        loadtable();

        function editdata(value) {
            $('#editpelanggan_id').val('');
            $('#editproduk_id').val('');
            $('#editjumlah').val('');
            setTimeout(() => {
                $.get('{{ url('') }}/api/produksi/show/' + value, function(data,
                    status) {
                    if (data.error == false) {
                        $('#editid').val(value);
                        $('#editpelanggan_id').val(data.result.pelanggan_id);
                        $('#editproduk_id').val(data.result.produk_id);
                        $('#editjumlah').val(data.result.jumlah);
                    }
                });
            }, 100);
        }


        $(document).ready(function() {

            $('#forminput').on('submit', function(e) {

                e.preventDefault();

                var datas = $("#forminput").serialize();

                $.ajax({
                    type: "POST",
                    url: "{{ url('') }}/api/produksi/create",
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
                    url: "{{ url('') }}/api/produksi/update/"+id,
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
                        url: "{{ url('') }}/api/produksi/delete/" + value
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
