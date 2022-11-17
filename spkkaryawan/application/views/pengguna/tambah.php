<div class="container">
    <br />
    <div class="page-header">
    <h1>Tambah Pengguna</h1>
</div>
<div class="col-md-12">
    <?php echo form_open('',array('class' => 'form-horizontal')) ?>
    <div class="row">
        <div class="errors">
            <?php
//            dump($nilaiUniversitas);
//            dump($dataView);
//            foreach ($nilaiUniversitas as $item => $value) {
//                echo $value->nilai;
//            }
            $errors = $this->session->flashdata('errors');
            if (isset($errors)) {
                foreach ($errors as $error) {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo $error; ?>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="panel-content">
                <div class="col-xs-2 col-sm-12">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input name="nama" type="text" class="form-control" id="nama"
                                
                               placeholder="Masukan Nama Lengkap">
                              
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input name="username" type="text" class="form-control" id="username"
                              
                               placeholder="Masukan Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password"
                              
                               placeholder="Masukan Password">
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                       <select name="level" class="form-control" id="level"
                              
                               placeholder="Pilih Level">
                                <option value="1">HRD</option>
                                <option value="2">Manager</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Simpan</button>
                <a href="<?php echo site_url('pengguna/index') ?>" type="button" class="btn btn-danger" >Kembali</a>
                    </div>
                </div>
                </div>
            </div>
        </div>

       

        
    </div>
    <?php echo form_close() ?>
</div>