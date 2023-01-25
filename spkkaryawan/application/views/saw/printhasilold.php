<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cetak Hasil Penilaian Seleksi</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" />
    
</head>

<body onload="window.print()">
  <style type="text/css" media="print"> 
  @page { size:auto; margin:0; font-family: arial narrow; } 
</style>   
<table width=100% align="center" border="0" style="width:95%; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:0px;margin-bottom:10px;">
  <tr>
    <td>
            <div class="panel-heading"><h3>LAPORAN HASIL SELEKSI PENERIMAAN KARYAWAN</h3></div>
            <div class="panel-body">
                <font size="4px"><b>Tabel 1 - Nilai Awal</b></font><br>
                <div class="table-responsive">
                    <table border="1" bordercolor="#000000" width="100%" class="table table-bordered table-hover">
                        <tr class="active">
                            <th class="col-md-1 text-center">No</th>
                            <?php
                            $no = 1;
                            $table = $this->page->getData('table1');
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
                        foreach ($table as $item => $value) {
                            ?>
                            <tr>
                                <td class="col-md-1 text-center"><?php echo $no ?></td>
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
                <font size="4px"><b>Tabel 2 - Dihitung sesuai sifat cost atau benefit</b></font><br>
                <div class="table-responsive">
                    <table border="1" bordercolor="#000000" width="100%" class="table table-bordered table-hover">
                        <tr class="active">
                            <th class="col-md-1 text-center">No</th>
                            <?php
                            $no = 1;
                            $table = $this->page->getData('table2');
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
                <div class="table-responsive ">
                    <table border="1" bordercolor="#000000" width="100%" class="table table-bordered">
                        <tr class="active">
                            <th class="col-md-1 text-center">No</th>
                            <th class="text-center">Kriteria</th>
                            <th class="text-center">Sifat</th>
                            <th class="text-center">Nilai min /max</th>
                        </tr>
                        <?php
                        $dataSifat = $this->page->getData('dataSifat');
                        $no = 1;
                        foreach ($dataSifat as $item => $value) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no ?></td>
                                <td><?php echo $item ?></td>
                                <td><?php echo $value->sifat ?></td>
                                <td>
                                    <?php
                                    $valueMinMax = $dataSifat = $this->page->getData('valueMinMax');
                                    if (isset($valueMinMax['min' . $item])) {
                                        echo $valueMinMax['min' . $item] . ' - Minimal';
                                    }
                                    if (isset($valueMinMax['max' . $item])) {
                                        echo $valueMinMax['max' . $item] . ' - Maksimal';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                            $no++;
                        }
                        ?>
                    </table>
                </div>

                <br />
                
                    <font size="4px"><b>Tabel 3 - Dikali dengan bobot</b></font><br>
                <div class="table-responsive">
                    <table border="1" bordercolor="#000000" width="100%" class="table table-bordered table-hover">
                        <tr class="active">
                            <th class="col-md-1 text-center">No</th>
                            <?php
                            $no = 1;
                            $table = $this->page->getData('table3');
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
                <div class="table-responsive ">
                    <table border="1" bordercolor="#000000" width="100%" class="table table-bordered">
                        <tr class="active">
                            <th class="col-md-1 text-center">No</th>
                            <th class="text-center">Kriteria</th>
                            <th class="text-center">Bobot</th>
                        </tr>
                        <?php
                        $bobot = $this->page->getData('bobot');
                        $no = 1;
                        foreach ($bobot as $item => $value) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no ?></td>
                                <td><?php echo $value->kriteria ?></td>
                                <td class="text-center"><?php echo $value->bobot ?></td>

                            </tr>
                            <?php
                            $no++;
                        }
                        ?>
                    </table>
                </div>
                <br />
                <font size="4px"><b>Tabel 4 - Dijumlah sesuai dengan Pelamar dan di dapat hasil rangking</b></font><br>
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
                        <div class="alert alert-success" role="alert">
                            <h4><b>Kesimpulan : </b> Dari hasil perhitungan yang dilakukan menggunakan metode SAW
                                Pelamar terbaik untuk di pilih adalah
                                <?php echo $value->nama ?> dengan nilai <?php echo $value->Total ?>
                            </h4>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </td></tr></table>
        </div>
    </div>

</div>

</body>
</html>