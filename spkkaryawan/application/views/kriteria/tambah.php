<div class="container">
    <br />
        <div class="page-header">
        <h1>Tambah Kriteria</h1>
    </div>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="errors">
                <?php
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
            <?php echo form_open('',array('class' => 'form-horizontal'))?>
                <div class="form-group">
                    <?php echo form_label('Kriteria :', '',array('for' => 'inputKriteria', 'class' => 'col-xs-2')) ?>
                    <div class="col-sm-10">
                        <?php echo form_input('kriteria', set_value('kriteria'), array('id' => 'inputKriteria', 'class' =>'form-control' )) ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Sifat :', '',array('for' => 'inputSifat', 'class' => 'col-xs-2')) ?>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <?php echo form_radio('sifat','B', true )?> Benefit
                        </label>
                        <label class="radio-inline">
                            <?php echo form_radio('sifat','C' )?> Cost
                        </label>

                    </div>
                </div>
                <div class="form-group">
                    <?php echo form_label('Bobot :', '',array('for' => 'inputBobot', 'class' => 'col-xs-2')) ?>
                    <div class="col-sm-10">
                        <?php echo form_input('bobot', set_value('bobot'), array('id' => 'inputBobot', 'class' =>'form-control' )) ?>
                    </div>
                </div>

                <p> *)Catatan </p>
                <ul>
                <li><b>Benefit : </b> Kriteria yang melihat dari nilai sisi keuntungannya tinggi nilainya semakin bagus</li>
                <li><b>Cost : </b> Kriteria yang semakin rendah nilainya semakin bagus</li>
            </ul>

                <br>

                <div class="form-group">
                    <div class="col-xs-2 col-sm-10">
                        <?php echo form_submit('simpan', 'Simpan', array('class' => 'btn btn-success')) ?>
                        <a href="<?php echo site_url('kriteria/index') ?>" type="button" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            <?php echo form_close()?>
        </div>
    </div>

</div>
