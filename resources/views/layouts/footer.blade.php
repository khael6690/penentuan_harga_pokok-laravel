<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>{{@(new \App\Models\Perusahaan)::first()->nama}}</span></strong>. All Rights Reserved
    </div>

</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Template Main JS File -->
<script src="{{ url('') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('') }}/assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- Vendor JS Files -->
@stack('script')

<script>
    $(document).ready(function() {

        $('#formgantipassword').on('submit', function(e) {

            e.preventDefault();

            var datas = $("#formgantipassword").serialize();

            $.ajax({
                type: "POST",
                url: "{{ url('') }}/changepassword",
                dataType: "json",
                data: datas
            }).done(function(data) {
                if (data.error == false) {
                    Toastify({
                        text: "Berhasil diganti",
                        duration: 3000,
                        close: true,
                        backgroundColor: "#198754",
                    }).showToast()
                } else {
                    Toastify({
                        text: "Gagal diganti",
                        duration: 3000,
                        close: true,
                        backgroundColor: "#dc3545",
                    }).showToast()
                }
                $('#gantipassword').modal('hide')
                document.getElementById("formgantipassword").reset();
            }).fail(function(jqXHR, textStatus, errorThrown) {
                Toastify({
                    text: "Error",
                    duration: 3000,
                    close: true,
                    backgroundColor: "#dc3545",
                }).showToast()
                $('#gantipassword').modal('hide')
                document.getElementById("formgantipassword").reset();
            })
        });

    });
</script>

</body>

</html>
