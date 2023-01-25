<div class="container">
    <br />
    <div class="page-header">
        <h1>Cetak Seleksi</h1>
    </div>
    <div class="row">

        <div class="col-md-10 m-b-3">
        </div>
        <div class="col-md-2 m-b-3">
            <label for="">Bulan</label>
            <input type="month" id="periode" class="form-control" value="<?= $this->uri->segment(3) == '' ? date('Y-m') : $this->uri->segment(3) ?>" onchange="ganti_periode()">
        </div>
    </div>
    <br>


    <div class="col-lg-12 m-t-3" style="margin-top:10px"> <?php
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
                                    <th>Posisi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $bulan=explode('-',$this->uri->segment(3))[1];
                                $tahun=explode('-',$this->uri->segment(3))[0];
                                $cek_spv = $this->db->query("SELECT * FROM tbl_pelamar WHERE posisi='spv' AND MONTH(periode)='$bulan' AND YEAR(periode)='$tahun'")->num_rows();
                                $cek_admin = $this->db->query("SELECT * FROM tbl_pelamar WHERE posisi='admin' AND MONTH(periode)='$bulan' AND YEAR(periode)='$tahun'")->num_rows();
                                $cek_sales = $this->db->query("SELECT * FROM tbl_pelamar WHERE posisi='sales' AND MONTH(periode)='$bulan' AND YEAR(periode)='$tahun'")->num_rows();
                                $cek_sopir = $this->db->query("SELECT * FROM tbl_pelamar WHERE posisi='sopir' AND MONTH(periode)='$bulan' AND YEAR(periode)='$tahun'")->num_rows();
                                
                                ?>    

                                <?php if($cek_spv>0){     ?>                  
                                <tr>
                                    <td>1.</td>
                                    <td>SPV</td>

                                    <td>

                                        <a target="_blank" href="<?php echo site_url('rangking/cetak/spv/' . $this->uri->segment(3)) ?>" type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</a>  <a  href="<?php echo site_url('rangking/detail/spv/' . $this->uri->segment(3)) ?>" type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Detail</a>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php if($cek_admin>0){     ?>                  

                                <tr>
                                    <td>2.</td>
                                    <td>Admin</td>

                                    <td>

                                    <a target="_blank" href="<?php echo site_url('rangking/cetak/admin/' . $this->uri->segment(3)) ?>" type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</a> 
                                      <a  href="<?php echo site_url('rangking/detail/admin/' . $this->uri->segment(3)) ?>" type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Detail</a>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php if($cek_sales>0){     ?>  
                                <tr>
                                    <td>3.</td>
                                    <td>Sales</td>

                                    <td>

                                        <a target="_blank" href="<?php echo site_url('rangking/cetak/sales/' . $this->uri->segment(3)) ?>" type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</a>  <a  href="<?php echo site_url('rangking/detail/sales/' . $this->uri->segment(3)) ?>" type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Detail</a>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php if($cek_sopir>0){     ?>  
                                <tr>
                                    <td>4.</td>
                                    <td>Sopir</td>

                                    <td>

                                        <a target="_blank" href="<?php echo site_url('rangking/cetak/sopir/' . $this->uri->segment(3)) ?>" type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</a>  <a href="<?php echo site_url('rangking/detail/sopir/' . $this->uri->segment(3)) ?>" type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Detail</a>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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

                                <div class="col-md-3"><b>Kriteria <?php echo $no ?> </b></div>
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


    <script>
        function ganti_periode() {
            var periode = $('#periode').val();
            window.location.href = "<?= base_url('rangking/pilih/') ?>" + periode;
        }
    </script>