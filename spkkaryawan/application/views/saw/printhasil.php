<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cetak Hasil Penilaian Seleksi</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" />

</head>

<body onload="window.print()">
    <style type="text/css" media="print">
        @page {
            size: auto;
            margin: 0;
            font-family: arial narrow;
        }
    </style>
    <table width=100% align="center" border="0" style="width:95%; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:0px;margin-bottom:10px;">
        <tr>
            <td>
                <center><h1>PT. MITRA GEMILANG INTI PERKASA</h1></center>
                <div class="panel-heading center">
                    <center><h3>LAPORAN HASIL SELEKSI PENERIMAAN KARYAWAN <?= strtoupper($this->uri->segment(3)) ?></h3></center>
                    <h4>Periode : <?= $this->uri->segment(4) ?></h4>
                </div>
                <div class="panel-body">

                    <font size="4px"><b>Dari hasil perhitungan yang dilakukan menggunakan metode SAW
                            Pelamar terbaik dapat di lihat dari tabel perangkingan dibawah ini</b></font><br>
                    <div class="table-responsive">
                        <table border="1" bordercolor="#000000" width="100%" class="table table-bordered table-hover">
                            <tr class="active">
                                <th class="col-md-1 text-center">No</th>
                                <?php
                                $no = 1;
                                $table = $this->page->getData('tableFinal');
                                foreach ($table as $item => $value) {
                                    foreach ($value as $heading => $itemValue) {
                                ?>
                                        <th class="text-center"><?php echo $heading ?></th>
                                <?php
                                    }
                                    break;
                                }
                                ?>
                            </tr>
                            <?php

                            

                            usort($table,function($first,$second){
                                return $first->Rangking > $second->Rangking;
                            });
                          
                            foreach ($table as $item => $value) {
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $no ?></td>
                                    <?php
                                    foreach ($value as $itemValue) {
                                    ?>
                                        <td><?php echo $itemValue ?></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </table>
                    </div>
                    <br />
                    <?php
                    $table = $this->page->getData('tableFinal');
                    foreach ($table as $item => $value) {
                        if ($value->Rangking == 1) {
                    ?>
                            <!-- <div class="alert alert-success" role="alert">
                                <h4><b>Kesimpulan : </b> Dari hasil perhitungan yang dilakukan menggunakan metode SAW
                                    Pelamar terbaik untuk di pilih adalah
                                    <?php echo $value->nama ?> dengan nilai <?php echo $value->Total ?>
                                </h4>
                            </div> -->
                    <?php
                        }
                    }
                    ?>
                </div>
            </td>
        </tr>
    </table>
    </div>
    </div>

    </div>


    <p>&nbsp;</p>
    <table width="95%" align="center">
        <tr>
            <td>&nbsp;</td>
            <td width="300">
                <div align="center"><b>Pekalongan,
                        <?php echo date('d F Y'); ?>
                    </b></div>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td width="200">
                <div align="center"><b>MANAGER</b></div>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td height="70">
                <div align="center"></div>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <div align="center"><b>( .................................... )</b></div>
            </td>
        </tr>
    </table>
</body>

</html>