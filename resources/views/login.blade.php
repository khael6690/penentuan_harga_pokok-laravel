<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/toastify-js/src/toastify.css">

    {{-- <script src="../assets/js/checkauth.js"></script> --}}

</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            @if (!empty(@(new \App\Models\Perusahaan)::first()->foto))
                            <img src="{{url('')}}/uploads/perusahaan/logo/{{@(new \App\Models\Perusahaan)::first()->foto}}" width="150" height="150" alt="logo">
                            @endif
                            <div class="d-flex justify-content-center py-4">
                                <a href="{{url('')}}" class="logo d-flex align-items-center w-auto">
                                    <span class="d-none d-lg-block">{{ config('app.name', 'Laravel') }}</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                                    </div>

                                    <form method="post" id="formlogin" class="row g-3 needs-validation" novalidate>
                                        @csrf
                                        <div class="col-12">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control" id="username"
                                                required autofocus>
                                            <div class="invalid-feedback">Silahkan Masukan Username Anda!</div>
                                        </div>

                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                required>
                                            <div class="invalid-feedback">Silahkan Masukan Password Anda!</div>
                                        </div>

                                        <div class="col-12">
                                            <button id="btnlogin" class="btn btn-primary w-100"
                                                type="submit">Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/toastify-js/src/toastify.js"></script>

    <script>
        $(document).ready(function() {

            $('#formlogin').on('submit', function(e) {

                e.preventDefault();

                var datas = $("#formlogin").serialize();

                $.ajax({
                    type: "POST",
                    url: "/logon",
                    dataType: "json",
                    beforeSend: function() {
                        $('#btnlogin').html('<i class="fa-solid fa-circle-notch fa-spin"></i>');
                    },
                    data: datas
                }).done(function(data) {
                    if (data.error == false) {
                        Toastify({
                            text: "Login Berhasil",
                            duration: 3000,
                            close: true,
                            backgroundColor: "#198754",
                        }).showToast()
                        setTimeout(() => {
                            window.location = data.redirect
                        }, 300);

                    } else {
                        Toastify({
                            text: "Login Gagal",
                            duration: 3000,
                            close: true,
                            backgroundColor: "#dc3545",
                        }).showToast()
                        $('#btnlogin').html('Login');
                    }
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    Toastify({
                            text: "Error",
                            duration: 3000,
                            close: true,
                            backgroundColor: "#dc3545",
                        }).showToast()
                })

            });
        })
    </script>

</body>

</html>
