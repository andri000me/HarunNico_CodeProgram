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
<script type="application/javascript">
    function showNama() {
        var xhttp;
        xhttp = new XMLHttpRequest();
        var id_ktgr_brg = document.getElementById("kbrg");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("nbrg").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", document.getElementById("ajaxurlnama").value + id_ktgr_brg.options[id_ktgr_brg.selectedIndex].value, true);
        xhttp.send();
    }

    function showMerk() {
        var xhttp;
        xhttp = new XMLHttpRequest();
        var id_nama_barang = document.getElementById("nbrg");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("mbrg").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", document.getElementById("ajaxurlmerk").value + id_nama_barang.options[id_nama_barang.selectedIndex].value, true);
        xhttp.send();
    }
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
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

<!-- Demo scripts for this page-->
<script src="<?= base_url('assets/js/demo/datatables-demo.js'); ?>"></script>
<!-- <script src="<?= base_url('assets/js/demo/chart-area-demo.js'); ?>"></script> -->
</body>

</html>