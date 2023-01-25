<?php
error_reporting(0);
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/frontend/img/favicon.png" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/datatables/dataTables.bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/sweetalert/sweetalert.css" />
    <script type="text/javascript" src="<?= base_url() ?>assets/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/kriteria.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/pelamar.js?ver=5"></script>
    <title>SPK PENERIMAAN KARYAWAN BARU</title>

</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= site_url() ?>admin">PT. MITRA GEMILANG INTI PERKASA</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php if ($_SESSION['level'] == "1") { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kriteria<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= site_url() ?>kriteria">Kriteria</a></li>
                                <li><a href="<?= site_url() ?>subkriteria">Sub Kriteria</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= site_url() ?>pelamar">Pelamar</a></li>
                        <li><a href="<?= site_url() ?>seleksi">Seleksi</a></li>
                    <?php } ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= site_url() ?>pelamar/cetak" target="_blank">Laporan Data Pelamar</a></li>
                            <li><a href="<?= site_url() ?>lapseleksi">Laporan Hasil Seleksi</a></li>
                        </ul>
                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pengguna : [ <?php echo $_SESSION['nama']; ?> ] <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php if ($_SESSION['level'] == "1") { ?>
                                <li><a href="<?= site_url() ?>pengguna"><span class="glyphicon glyphicon-user"></span> Data Pengguna</a></li>
                            <?php } ?>
                            <li><a href="<?= site_url() ?>/admin/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        $(".dataTable").DataTable({
            "aaSorting": [],
            initComplete: function(settings, json) {
                $('.dataTable').wrap('<div class="table-responsive"></div>');
            },
            language: {
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Cari:"
            },
            "pagingType": "full_numbers"
        });

        $(document).on('click', '.del', function() {
            var href = $(this).attr('rel');
            swal({
                    title: "Anda yakin?",
                    text: "Data yang telah dihapus tidak dapat dikembalikan!",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: "Batalkan",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ya, Saya yakin!",
                    closeOnConfirm: false
                },
                function() {
                    swal({
                            title: "Terhapus!",
                            text: "Data yang Anda maksud telah berhasil dihapus.",
                            type: "success"
                        },
                        function() {
                            window.location = href;
                        });
                });

            return false;
        });
    </script>
</body>

</html>