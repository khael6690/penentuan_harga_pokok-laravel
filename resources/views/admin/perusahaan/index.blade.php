@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/toastify-js/src/toastify.css">
@endpush

@section('content')
    @include('admin.sidebar')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $title }}</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                            </div>

                            <form id="formupdate" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Perusahaan</label>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                required value="{{ @$perusahaan->nama }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Detail Alamat dan Nomor Telepon Perusahaan</label>
                                            <textarea class="form-control" id="alamat" name="alamat" required>{{ @$perusahaan->alamat }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Foto Perusahaan</label>
                                            <input type="file" class="form-control" id="foto" name="foto" accept="image/x-png,image/gif,image/jpeg,image/jpg" onchange="tampilkanPreview(this,'fotoperusahaan')">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="{{ isset($perusahaan->foto) ? url('/uploads/perusahaan/logo/').'/'.@$perusahaan->foto : 'https://www.buwelldrillers.co.nz/assets/camaleon_cms/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png' }}" id="fotoperusahaan" width="300" height="300" alt="">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection

@push('script')
    <script src="{{ url('') }}/assets/vendor/toastify-js/src/toastify.js"></script>

    <script>
        function tampilkanPreview(userfile, idpreview) {
            var gb = userfile.files;

            for (var i = 0; i < gb.length; i++) {
                var gbPreview = gb[i];
                var imageType = /image.*/;
                var preview = document.getElementById(idpreview);
                var reader = new FileReader();
                if (gbPreview.type.match(imageType)) {
                    preview.file = gbPreview;
                    reader.onload = (function(element) {
                        return function(e) {
                            element.src = e.target.result;
                        };
                    })(preview);

                    reader.readAsDataURL(gbPreview);
                } else {
                    alert("Tipe file tidak sesuai. Gambar harus bertipe .png atau .jpg.");
                }
            }
        }

        $(document).ready(function() {

            $('#formupdate').on('submit', function(e) {

                e.preventDefault();
                var datas = new FormData($("#formupdate")[0]);

                $.ajax({
                    type: "POST",
                    url: "{{ url('') }}/api/perusahaan/create",
                    dataType: "json",
                    cache       : false,
                    contentType : false,
                    processData : false,
                    data: datas
                }).done(function(data) {
                    if (data.error == false) {
                        Toastify({
                            text: "Berhasil diubah",
                            duration: 3000,
                            close: true,
                            backgroundColor: "#198754",
                        }).showToast()
                    } else {
                        Toastify({
                            text: data.message,
                            duration: 3000,
                            close: true,
                            backgroundColor: "#dc3545",
                        }).showToast()
                    }
                    $('#foto').val('')
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    Toastify({
                        text: "Error",
                        duration: 3000,
                        close: true,
                        backgroundColor: "#dc3545",
                    }).showToast()
                    $('#foto').val('')
                })
            });

        });
    </script>
@endpush
