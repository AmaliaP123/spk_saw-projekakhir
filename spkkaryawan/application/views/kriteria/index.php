
<div class="container">
    <br />
    
<div class="page-header">
    <h1>Kriteria</h1>
    <div align="right">
            <a href="<?php echo site_url('kriteria/tambah') ?>" type="button" class="btn btn-primary">Tambah
                Kriteria</a>
        </div>
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

     $errr = $this->session->flashdata('errr');
    if (isset($errr)) {
        ?>
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?php echo $errr; ?>
        </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Data Kriteria</div>
            <div class="panel-content">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kriteria</th>
                            <th>Sifat</th>
                            <th>Bobot</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $no = 1;
                        $totalBobot = 0;
                        foreach ($kriteria as $item) {

                            $totalBobot+=$item->bobot ;
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $item->kriteria ?></td>
                                <td><?php echo $item->sifat ?></td>
                                <td><?php echo $item->bobot ?></td>
                                <td>

                                    <!-- Contextual button for informational alert messages -->
                                    

                                    <!-- Indicates caution should be taken with this action -->
                                    <button type="button" class="btn btn-warning btn-xs"
                                            onclick="edit_kriteria(<?php echo $item->kdKriteria; ?>)">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Ubah 
                                    </button>

                                    <!-- Indicates a dangerous or potentially negative action -->
                                    <button type="button" data-toggle="modal" class="btn btn-danger btn-xs"
                                            data-target="#modalDelete">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Hapus
                                    </button>
                                    <button type="button" class="btn btn-info btn-xs"
                                            onclick="lihat_kriteria(<?php echo $item->kdKriteria; ?>)">
                                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Lihat
                                    </button>

                                </td>
                            </tr>
                        <?php } ?>

                           <tr>
                            
                            <td colspan="3">Total Bobot</td>  
                            <td><?=$totalBobot?></td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    


</div>

<!-- Bootstrap modal -->
<div class="modal fade" id="form_kriteria" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Ubah Kriteria Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="formKriteria" class="form-horizontal">
                    <div id="errors">

                    </div>
                    `
                    <div class="form-body">
                        <input name="kdKriteria" placeholder="Kode Kriteria" class="form-control" type="hidden">

                        <div class="form-group">
                            <label class="control-label col-md-3">Kriteria</label>
                            <div class="col-md-9">
                                <input name="kriteria" placeholder="Kriteria" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSifat" class="control-label col-md-3">Sifat </label>
                            <div class="col-sm-9">
                                <label class="radio-inline">
                                    <input type="radio" name="sifat" id="benefit" value="B" checked="checked"/>
                                    Benefit
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="sifat" id="cost" value="C"/>
                                    Cost
                                </label>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Bobot</label>
                            <div class="col-md-9">
                                <input name="bobot" placeholder="Bobot" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_kriteria()" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Bootstrap modal -->
<div class="modal fade " id="form_item_kriteria" role="dialog">
    <div class="modal-dialog modal-item-kriteria">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Ubah Item Kriteria Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="formItemKriteria" class="form-horizontal">
                    <div id="errors">

                    </div>
                    <div class="form-body">
                        <input id="kdKriteriaSub" name="kdKriteria" placeholder="Kode Kriteria" class="form-control"
                               type="hidden">
                        <?php
                        $no = 1;

                        for ($no; $no <= 5; $no++) {
                            ?>
                            <div class="form-group">
                                <label class="control-label col-md-2">Item Kriteria <?php echo $no ?></label>
                                <div class="col-md-8">
                                    <input name="itemKriteria<?php echo $no ?>"
                                           placeholder="Item Kriteria <?php echo $no ?>" class="form-control"
                                           type="text">
                                    <input name="kdSubKriteria<?php echo $no ?>" type="hidden">
                                </div>
                                <div class="col-sm-2">
                                    <label class="control-label col-md-4">Value</label>
                                    <div class="col-md-6">
                                        <input name="value<?php echo $no ?>" placeholder="" class="form-control"
                                               type="text" disabled>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        ?>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_item_kriteria()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modalDelete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi hapus data</h4>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin menghapus data ini ? </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="hapus_kriteria(<?php echo $item->kdKriteria; ?>)">
                    Hapus
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


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
                    
                    <div class="panel-body">

                        <div class=" col-md-3"><b>Kode Kriteria </b></div>
                        <div class="col-md-9">
                            <div id="viewKodeKriteria"></div>
                        </div>

                        <div class=" col-md-3"><b>Kriteria </b></div>
                        <div class="col-md-9">
                            <div id="viewKriteria"></div>
                        </div>

                        <div class=" col-md-3"><b>Sifat</b></div>
                        <div class="col-md-9">
                            <div id="viewSifat"></div>
                        </div>

                        <div class=" col-md-3"><b>Bobot</b></div>
                        <div class="col-md-9">
                            <div id="viewBobot"></div>
                        </div>

                    </div>
                </div>


                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>


