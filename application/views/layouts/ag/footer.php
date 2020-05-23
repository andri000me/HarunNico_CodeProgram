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

    function showLorong() {
        var xhttp;
        xhttp = new XMLHttpRequest();
        var id_lorong = document.getElementById("lorong");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("isitabel").innerHTML = this.responseText;
            }
        };
        //alert(document.getElementById("ajaxurllorong").value+id_lorong.options[id_lorong.selectedIndex].value);
        xhttp.open("GET", document.getElementById("ajaxurllorong").value + id_lorong.options[id_lorong.selectedIndex].value, true);
        xhttp.send();
    }

    function showBarang1() {
        var xhttp;
        xhttp = new XMLHttpRequest();
        var id_barang = document.getElementById("barang");
        var field = ["kbrg", "nbrg", "mbrg", "jbrg", "pbrg", "lbrg", "tbrg"]
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("kbrg").value = this.responseText;
            }
        };
        xhttp.open("GET", document.getElementById("ajaxurlbarang1").value + id_barang.options[id_barang.selectedIndex].value, true);
        xhttp.send();
    }

    function showBarang2() {
        var xhttp;
        xhttp = new XMLHttpRequest();
        var id_barang = document.getElementById("barang");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("nbrg").value = this.responseText;
            }
        };
        xhttp.open("GET", document.getElementById("ajaxurlbarang2").value + id_barang.options[id_barang.selectedIndex].value, true);
        xhttp.send();
    }

    function showBarang3() {
        var xhttp;
        xhttp = new XMLHttpRequest();
        var id_barang = document.getElementById("barang");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("mbrg").value = this.responseText;
            }
        };
        xhttp.open("GET", document.getElementById("ajaxurlbarang3").value + id_barang.options[id_barang.selectedIndex].value, true);
        xhttp.send();
    }

    function showBarang4() {
        var xhttp;
        xhttp = new XMLHttpRequest();
        var id_barang = document.getElementById("barang");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("jbrg").value = this.responseText;
            }
        };
        xhttp.open("GET", document.getElementById("ajaxurlbarang4").value + id_barang.options[id_barang.selectedIndex].value, true);
        xhttp.send();
    }

    function showBarang5() {
        var xhttp;
        xhttp = new XMLHttpRequest();
        var id_barang = document.getElementById("barang");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("pbrg").value = this.responseText;
            }
        };
        xhttp.open("GET", document.getElementById("ajaxurlbarang5").value + id_barang.options[id_barang.selectedIndex].value, true);
        xhttp.send();
    }

    function showBarang6() {
        var xhttp;
        xhttp = new XMLHttpRequest();
        var id_barang = document.getElementById("barang");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("lbrg").value = this.responseText;
            }
        };
        xhttp.open("GET", document.getElementById("ajaxurlbarang6").value + id_barang.options[id_barang.selectedIndex].value, true);
        xhttp.send();
    }

    function showBarang7() {
        var xhttp;
        xhttp = new XMLHttpRequest();
        var id_barang = document.getElementById("barang");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tbrg").value = this.responseText;
            }
        };
        xhttp.open("GET", document.getElementById("ajaxurlbarang7").value + id_barang.options[id_barang.selectedIndex].value, true);
        xhttp.send();
    }

    function showBarang8() {
        var xhttp;
        xhttp = new XMLHttpRequest();
        var id_barang = document.getElementById("barang");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("idkbrg").value = this.responseText;
            }
        };
        xhttp.open("GET", document.getElementById("ajaxurlbarang8").value + id_barang.options[id_barang.selectedIndex].value, true);
        xhttp.send();
    }

    function showBarang9() {
        var xhttp;
        xhttp = new XMLHttpRequest();
        var id_barang = document.getElementById("barang");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("idnbrg").value = this.responseText;
            }
        };
        xhttp.open("GET", document.getElementById("ajaxurlbarang9").value + id_barang.options[id_barang.selectedIndex].value, true);
        xhttp.send();
    }

    function showBarang10() {
        var xhttp;
        xhttp = new XMLHttpRequest();
        var id_barang = document.getElementById("barang");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("idmbrg").value = this.responseText;
            }
        };
        xhttp.open("GET", document.getElementById("ajaxurlbarang10").value + id_barang.options[id_barang.selectedIndex].value, true);
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

<!-- Demo scripts for this page-->
<script src="<?= base_url('assets/js/demo/datatables-demo.js'); ?>"></script>
<!-- <script src="<?= base_url('assets/js/demo/chart-area-demo.js'); ?>"></script> -->
</body>

</html>