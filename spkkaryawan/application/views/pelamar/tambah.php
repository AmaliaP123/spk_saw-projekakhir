<div class="container">
    <br />
    <div class="page-header">
    <h1>Tambah Pelamar</h1>
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
                        <label for="nik">NIK</label>
                        <input name="nik" type="text" class="form-control" id="nik" minlength="16" maxlength="16" onkeypress="return hanyaAngka(event)" required=""
                                
                               placeholder="Masukan NIK">
                              
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input name="nama" type="text" class="form-control" id="nama"
                              required=""
                               placeholder="Masukan Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input name="alamat" type="text" class="form-control" id="alamat"
                              required=""
                               placeholder="Masukan Alamat">
                    </div>
                    <div class="form-group">
                        <label for="notelp">No. Telepon</label>
                        <input name="notelp" type="text" class="form-control" id="notelp"
                              required=""
                               placeholder="Masukan No. Telepon">
                    </div>
                    <div class="form-group">
                        <label for="notelp">Posisi</label>
                        <select name="posisi" type="text" class="form-control" id="posisi">
                        <option value="Sales">Sales</option>   
                          <option value="Sopir">Sopir</option>   
                          <option value="SPV">SPV</option>   
                          <option value="Admin">Admin</option>   
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Simpan</button>
                <a href="<?php echo site_url('pelamar/index') ?>" type="button" class="btn btn-danger" >Kembali</a>
                    </div>
                </div>
                </div>
            </div>
        </div>

       

        
    </div>
    <?php echo form_close() ?>
</div>
<script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }
  </script>