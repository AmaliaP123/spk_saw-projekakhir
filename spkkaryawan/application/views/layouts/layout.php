<!doctype html>
<html lang="en">

<head>
    <title>
        <?php echo $this->page->generateTitle(); ?>
    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/frontend/img/favicon.png" />
    <?php
    $this->page->generateCss();
    ?>

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>


    <style>
        body {
            padding-top: 0px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top ">
            <div class="container">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand active" href="<?php echo site_url() . 'admin' ?>">PT. MITRA GEMILANG INTI PERKASA</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kriteria<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li <?php if ($this->uri->segment(1) == 'kriteria') {
                                        ?> class="active" <?php
                                                        } ?>><a href="<?php echo site_url('kriteria'); ?>"><span class="glyphicon glyphicon-edit"></span>&nbsp;Kriteria</a></li>
                                    <li><a href="<?= site_url() ?>subkriteria"><span class="glyphicon glyphicon-edit"></span>&nbsp;Sub Kriteria</a></li>
                                </ul>
                            </li>

                            <li <?php if ($this->uri->segment(1) == 'pelamar') {
                                ?> class="active" <?php
                                                } ?>><a href="<?php echo site_url('pelamar'); ?>">Pelamar</a></li>
                            <li <?php if ($this->uri->segment(1) == 'seleksi') {
                                ?> class="active" <?php
                                                } ?>><a href="<?php echo site_url('seleksi'); ?>">Seleksi</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li <?php if ($this->uri->segment(1) == 'lappelamar') {
                                        ?> class="active" <?php
                                                        } ?>><a href="<?php echo site_url('pelamar/cetak'); ?>" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;Laporan Data Pelamar</a></li>
                                    <li>
                                        <a href="<?= site_url() ?>rangking/pilih/<?= date('Y-m') ?>" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;Laporan Hasil Seleksi</a>
                                    </li>


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
                    </div><!-- /.navbar-collapse -->
                </div>


            </div>
        </nav>
    </div>


    <?php $this->load->view($view, $data); ?>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        var base_url = "<?php echo site_url(); ?>";
    </script>
    <?php
    $this->page->generateJs();
    ?>
</body>

</html>