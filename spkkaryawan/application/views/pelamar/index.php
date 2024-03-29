<div class="container">
    <br />
    <div class="page-header">
        <h1>Pelamar</h1>

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

    <div class="col-lg-12 m-t-3" style="margin-top:10px">
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


                <div class="panel-heading">Data Pelamar




                </div>


                <div class="panel-content">
                    <div class="table-responsive">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat</th>
                                    <th>No. Telepon</th>
                                    <th>Posisi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if (isset($pelamar)) {
                                    if (count($pelamar) == 0) {
                                        echo '<tr><td colspan="3" class="text-center"><h3>No Data Input</h3></td></tr>';
                                    }
                                    foreach ($pelamar as $item) {
                                ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $item->nik ?></td>
                                            <td><?php echo $item->nama ?></td>
                                            <td><?php echo $item->alamat ?></td>
                                            <td><?php echo $item->notelp ?></td>
                                            <td><?php echo $item->posisi ?></td>
                                            <td><?php echo $item->periode ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-xs" onclick="edit_pelamar(<?php echo $item->kdPelamar; ?>)">
                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Ubah
                                                </button>

                                                <!-- Indicates a dangerous or potentially negative action -->
                                                <!-- <button type="button" data-toggle="modal" class="btn btn-danger btn-xs"
                                                data-target="#modalDelete">
                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Hapus
                                        </button> -->
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>



    </div>
    <!-- Bootstrap modal -->
    <div class="modal fade" id="form_pelamar" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Ubah Pelamar Form</h3>
                </div>
                <div class="modal-body form">
                    <form action="#" id="formPelamar" class="form-horizontal">
                        <div id="errors">

                        </div>
                        `
                        <div class="form-body">
                            <input name="kdPelamar" placeholder="Kode Pelamar" class="form-control" type="hidden">

                            <div class="form-group">
                                <label class="control-label col-md-3">NIK</label>
                                <div class="col-md-9">
                                    <input name="nik" placeholder="NIK" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Nama</label>
                                <div class="col-md-9">
                                    <input name="nama" placeholder="Nama Lengkap" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Alamat</label>
                                <div class="col-md-9">
                                    <input name="alamat" placeholder="Alamat" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">No. Telepon</label>
                                <div class="col-md-9">
                                    <input name="notelp" placeholder="No. Telepon" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="notelp">Posisi</label>

                                <div class="col-md-9">
                                    <select name="posisi" type="text" class="form-control" id="posisi">
                                        <option value="Sales">Sales</option>
                                        <option value="Sopir">Sopir</option>
                                        <option value="SPV">SPV</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Tanggal</label>
                                <div class="col-md-9">
                                    <input name="periode" placeholder="No. Telepon" class="form-control" type="date">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save_pelamar()" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade" tabindex="-1" role="dialog" id="modalDelete">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Konfirmasi hapus data</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin menghapus data ini ? </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="hapus_pelamar(<?php echo $item->kdPelamar; ?>)">
                        Hapus
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <script>
        function ganti_periode() {
            var periode = $('#periode').val();
            window.location.href = "<?= base_url('pelamar/index/') ?>" + periode;
        }
    </script>