<div class="col-lg-12">

    <div class="row">
        <div class="panel panel-default">

            <div class="panel-heading">Tabel Perhitungan</div>
            <div class="panel-body">
                <h3>Tabel 1 - Nilai Awal</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
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

                <h3>Tabel 2 - Dihitung sesuai sifat cost atau benefit</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
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

                <div class="table-responsive ">
                    <table class="table table-bordered">
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

                <h3>Tabel 3 - Dikali dengan bobot</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
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

                <div class="table-responsive ">
                    <table class="table table-bordered">
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
                <h3>Tabel 4 - Dijumlah sesuai dengan Pelamar dan di dapat hasil rangking</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr class="active">
                            <th class="col-md-1 text-center">No</th>
                            <?php
                            $no = 1;
                            $table = $this->page->getData('tableFinal');
                            usort($table,function($first,$second){
                                return $first->Rangking > $second->Rangking;
                            });
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
        </div>
    </div>

</div>