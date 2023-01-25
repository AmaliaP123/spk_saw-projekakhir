<div class="container">
    <br />
    <div class="page-header">
        <h1>Penilaian Seleksi</h1>
    </div>
    <div class="col-md-12">
        <?php echo form_open() ?>
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
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="nama">Nama Pelamar</label>
                            <input name="nama" type="text" class="form-control" id="nama" value="<?php echo isset($nilaiPelamar[0]->nama) ? $nilaiPelamar[0]->nama : '' ?>" placeholder="Nama Pelamar" disabled>
                            <input name="kdPelamar" type="hidden" class="form-control" id="kdPelamar" value="<?php echo isset($nilaiPelamar[0]->kdPelamar) ? $nilaiPelamar[0]->kdPelamar : '' ?>" placeholder="Kode Pelamar">
                        </div>
                        <div class="form-group">
                            <label for="nama">Posisi</label>
                            <input type="text" class="form-control" value="<?php echo isset($nilaiPelamar[0]->posisi) ? $nilaiPelamar[0]->posisi : '' ?>" disabled>

                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th class="col-md-3">Kriteria</th>
                        <th colspan="5" class="text-center col-md-9">Nilai</th>
                    </tr>
                    <?php
                    // echo "<pre>";
                    // print_r($dataView);
                    // echo "</pre>";
                    foreach ($dataView as $item) {
                    ?>
                        <tr>
                            <td><?php echo $item['nama']; ?></td>
                            <?php
                            $no = 1;
                            foreach ($item['data'] as $dataItem) {
                                $cek = $this->db->query("SELECT * FROM tbl_seleksi WHERE kdPelamar='" . $this->uri->segment(3) . "' AND kdKriteria='$dataItem->kdKriteria' AND nilai='$dataItem->value'")->num_rows();
                            ?>
                                <td>
                                    <input type="radio" name="nilai[<?php echo $dataItem->kdKriteria ?>]" value="<?php echo $dataItem->value ?>" <?= $cek > 0 ? 'checked' : '' ?> />
                                    <?php echo ($dataItem->subKriteria) ?>

                                </td>

                        <?php
                                $no++;
                            }
                            echo '</tr>';
                        }
                        ?>

                </table>

                <table class="table table-responsive">
                    <tr>
                        <td colspan="7">Kelengkapan Berkas</td>
                        <?php
                        $k_berkas = $this->db->query("SELECT * FROM tbl_berkas WHERE kdPelamar='" . $this->uri->segment(3) . "'")->row();
                        ?>

                    </tr>
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="ijazah" id="ijazah" <?= @$k_berkas->ijazah == 1 ? 'checked' : '' ?>>
                                <label class="form-check-label" for="ijazah">
                                    ijazah
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="ktp" id="KTP" <?= @$k_berkas->ktp == 1 ? 'checked' : '' ?>>
                                <label class="form-check-label" for="KTP">
                                    KTP
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="kk" id="KK" <?= @$k_berkas->kk == 1 ? 'checked' : '' ?>>
                                <label class="form-check-label" for="KK">
                                    KK
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="lamaran" id="lamaran" <?= @$k_berkas->lamaran == 1 ? 'checked' : '' ?>>
                                <label class="form-check-label" for="lamaran">
                                    Surat lamaran kerja
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="cv" id="CV" <?= @$k_berkas->cv == 1 ? 'checked' : '' ?>>
                                <label class="form-check-label" for="CV">
                                    CV
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="sehat" id="sehat" <?= @$k_berkas->sehat == 1 ? 'checked' : '' ?>>
                                <label class="form-check-label" for="sehat">
                                    Surat keterangan sehat
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="foto" id="Foto" <?= @$k_berkas->foto == 1 ? 'checked' : '' ?>>
                                <label class="form-check-label" for="Foto">
                                    Pas Foto
                                </label>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="pull-right">
                <div class="col-md-12">
                    <button class="btn btn-success" type="submit">Simpan</button>
                    <a class="btn btn-danger" href="<?php echo site_url('seleksi') ?>" role="button">Kembali</a>

                </div>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>