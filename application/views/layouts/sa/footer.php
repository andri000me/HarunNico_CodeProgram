<footer class="sticky-footer">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright © Nico & Harun</span>
        </div>
    </div>
</footer>

</div>
</div>
<a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
<script>
    function showNama() {
        var xhttp;
        xhttp = new XMLHttpRequest();
        var id_merk_kendaraan = document.getElementById("mkendaraan");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("nkendaraan").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", document.getElementById("ajaxurlnama").value + id_merk_kendaraan.options[id_merk_kendaraan.selectedIndex].value, true);
        xhttp.send();
    }
</script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

<!-- Page level plugin JavaScript-->
<script src="<?= base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/js/sb-admin.min.js'); ?>"></script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>

<!-- Demo scripts for this page-->
<script src="<?= base_url('assets/js/demo/datatables-demo.js'); ?>"></script>
<!-- <script src="<?= base_url('assets/js/demo/chart-area-demo.js'); ?>"></script> -->
</body>

</html>