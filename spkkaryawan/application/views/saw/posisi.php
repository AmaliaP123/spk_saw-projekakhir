<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" />

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/datatables/dataTables.bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/sweetalert/sweetalert.css" />
    <script type="text/javascript" src="<?= base_url() ?>assets/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/sweetalert/sweetalert.min.js"></script>
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