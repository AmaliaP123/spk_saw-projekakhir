<div class="container">
    <br />
    <div class="page-header">
    <h1>Penilaian Seleksi</h1>
</div>
<div class="col-lg-12">
    <?php
    $msg = $this->session->flashdata('message');
    if (isset($msg)) {
        ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?php echo $msg; ?>
        </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Data Penilaian Seleksi</div>
            <div class="panel-content">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $no = 1;
                        foreach ($pelamar as $item) {


                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $item->nik ?></td>
                                <td><?php echo $item->nama ?></td>
                                <td><?php echo $item->alamat ?></td>
                                <td><?php echo $item->notelp ?></td>
                                <td>

                                    <!-- Contextual button for informational alert messages -->
                                    
                                    <!-- Indicates caution should be taken with this action -->
                                 
                                    <a href="<?php echo site_url('seleksi/penilaian/' . $item->kdPelamar) ?>" type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>Seleksi</a>
                                    
                                    <button type="button" class="btn btn-info btn-xs"
                                            onclick="lihat_seleksi(<?php echo $item->kdPelamar; ?>)">
                                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Lihat
                                    </button>

                                   

                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

   


</div>

<!-- Bootstrap modal -->







<!-- Bootstrap modal -->
<div class="modal fade" id="view_kriteria" role="dialog">
    <div class="modal-dialog view-detail-kriteria">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Identitas Pelamar</h3>
                    </div>
                    <div class="panel-body">

                        <div class=" col-md-3"><b>NIK </b></div>
                        <div class="col-md-9">
                            <div id="viewnik"></div>
                        </div>

                        <div class=" col-md-3"><b>Nama Lengkap </b></div>
                        <div class="col-md-9">
                            <div id="viewnama"></div>
                        </div>

                        <div class=" col-md-3"><b>Alamat</b></div>
                        <div class="col-md-9">
                            <div id="viewalamat"></div>
                        </div>

                        <div class=" col-md-3"><b>No. Telepon</b></div>
                        <div class="col-md-9">
                            <div id="viewnotelp"></div>
                        </div>

                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Penilaian</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        $no = 1;

                        for ($no; $no <= 5; $no++) {
                            ?>

                                <div class="col-md-3"><b>Kriteria  <?php echo $no ?> </b></div>
                                <div class="col-md-3">
                                    <div class="left" id="viewItemKriteria<?php echo $no ?>"></div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-md-1"><b>=</b></div>
                                    <div class="col-md-7">
                                        <div class="left" id="viewValue<?php echo $no ?>"></div>
                                    </div>
                                </div>

                        <?php }
                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

