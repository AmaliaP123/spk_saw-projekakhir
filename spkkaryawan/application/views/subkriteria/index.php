<div class="container">
    <br />
    <div class="page-header">
    <h1>Sub Kriteria</h1>
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
            <div class="panel-heading">Data Sub Kriteria</div>
            <div class="panel-content">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kriteria</th>
                            <th>Sub Kriteria 1</th>
                            <th>Sub Kriteria 2</th>
                            <th>Sub Kriteria 3</th>
                            <th>Sub Kriteria 4</th>
                            <th>Sub Kriteria 5</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $no = 1;
                        foreach ($kriteria as $item) {


                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $item->kriteria ?></td>
                                <?php $querysub = $this->db->query("select * from tbl_subkriteria where kdKriteria='$item->kdKriteria' order by value asc"); 
                            foreach($querysub->result() as $sub) {  ?>
                                <td><?php echo $sub->subKriteria ?></td>
                            <?php } ?>
                                <td>

                                    <!-- Contextual button for informational alert messages -->
                                    
                                    <!-- Indicates caution should be taken with this action -->
                                 

                                    <button type="button" class="btn btn-warning btn-xs"
                                            onclick="edit_item_kriteria(<?php echo $item->kdKriteria; ?>)">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Ubah 
                                    </button>
                                    <button type="button" class="btn btn-info btn-xs"
                                            onclick="lihat_subkriteria(<?php echo $item->kdKriteria; ?>)">
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
                        <input id="kdKriteria" name="kdKriteria" placeholder="Kode Kriteria" class="form-control" type="hidden">
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
                <button type="button" id="btnSave" onclick="save_item_kriteria()" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
                        <?php
                        $no = 1;

                        for ($no; $no <= 5; $no++) {
                            ?>

                                <div class="col-md-4"><b>Item Kriteria  <?php echo $no ?> :</b></div>
                                <div class="col-md-3">
                                    <div class="left" id="viewItemKriteria<?php echo $no ?>"></div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="col-md-7"><b>Value :</b></div>
                                    <div class="col-md-3">
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


