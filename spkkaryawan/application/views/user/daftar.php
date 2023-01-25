<?php
$this->load->view('user/header');
?>
<style type="text/css">
  .panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
  }

  .panel-body {
    padding: 15px;
  }

  .panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
  }

  .panel-heading>.dropdown .dropdown-toggle {
    color: inherit;
  }

  .panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 16px;
    color: inherit;
  }

  .panel-title>a,
  .panel-title>small,
  .panel-title>.small,
  .panel-title>small>a,
  .panel-title>.small>a {
    color: inherit;
  }

  .panel-footer {
    padding: 10px 15px;
    background-color: #f5f5f5;
    border-top: 1px solid #ddd;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
  }

  .panel>.list-group,
  .panel>.panel-collapse>.list-group {
    margin-bottom: 0;
  }

  .panel>.list-group .list-group-item,
  .panel>.panel-collapse>.list-group .list-group-item {
    border-width: 1px 0;
    border-radius: 0;
  }

  .panel>.list-group:first-child .list-group-item:first-child,
  .panel>.panel-collapse>.list-group:first-child .list-group-item:first-child {
    border-top: 0;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
  }

  .panel>.list-group:last-child .list-group-item:last-child,
  .panel>.panel-collapse>.list-group:last-child .list-group-item:last-child {
    border-bottom: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
  }

  .panel>.panel-heading+.panel-collapse>.list-group .list-group-item:first-child {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }

  .panel-heading+.list-group .list-group-item:first-child {
    border-top-width: 0;
  }

  .list-group+.panel-footer {
    border-top-width: 0;
  }

  .panel>.table,
  .panel>.table-responsive>.table,
  .panel>.panel-collapse>.table {
    margin-bottom: 0;
  }

  .panel>.table caption,
  .panel>.table-responsive>.table caption,
  .panel>.panel-collapse>.table caption {
    padding-right: 15px;
    padding-left: 15px;
  }

  .panel>.table:first-child,
  .panel>.table-responsive:first-child>.table:first-child {
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
  }

  .panel>.table:first-child>thead:first-child>tr:first-child,
  .panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child,
  .panel>.table:first-child>tbody:first-child>tr:first-child,
  .panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child {
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
  }

  .panel>.table:first-child>thead:first-child>tr:first-child td:first-child,
  .panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:first-child,
  .panel>.table:first-child>tbody:first-child>tr:first-child td:first-child,
  .panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:first-child,
  .panel>.table:first-child>thead:first-child>tr:first-child th:first-child,
  .panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:first-child,
  .panel>.table:first-child>tbody:first-child>tr:first-child th:first-child,
  .panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:first-child {
    border-top-left-radius: 3px;
  }

  .panel>.table:first-child>thead:first-child>tr:first-child td:last-child,
  .panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:last-child,
  .panel>.table:first-child>tbody:first-child>tr:first-child td:last-child,
  .panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:last-child,
  .panel>.table:first-child>thead:first-child>tr:first-child th:last-child,
  .panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:last-child,
  .panel>.table:first-child>tbody:first-child>tr:first-child th:last-child,
  .panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:last-child {
    border-top-right-radius: 3px;
  }

  .panel>.table:last-child,
  .panel>.table-responsive:last-child>.table:last-child {
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
  }

  .panel>.table:last-child>tbody:last-child>tr:last-child,
  .panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child,
  .panel>.table:last-child>tfoot:last-child>tr:last-child,
  .panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child {
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
  }

  .panel>.table:last-child>tbody:last-child>tr:last-child td:first-child,
  .panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child td:first-child,
  .panel>.table:last-child>tfoot:last-child>tr:last-child td:first-child,
  .panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child td:first-child,
  .panel>.table:last-child>tbody:last-child>tr:last-child th:first-child,
  .panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child th:first-child,
  .panel>.table:last-child>tfoot:last-child>tr:last-child th:first-child,
  .panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child th:first-child {
    border-bottom-left-radius: 3px;
  }

  .panel>.table:last-child>tbody:last-child>tr:last-child td:last-child,
  .panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child td:last-child,
  .panel>.table:last-child>tfoot:last-child>tr:last-child td:last-child,
  .panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child td:last-child,
  .panel>.table:last-child>tbody:last-child>tr:last-child th:last-child,
  .panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child th:last-child,
  .panel>.table:last-child>tfoot:last-child>tr:last-child th:last-child,
  .panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child th:last-child {
    border-bottom-right-radius: 3px;
  }

  .panel>.panel-body+.table,
  .panel>.panel-body+.table-responsive,
  .panel>.table+.panel-body,
  .panel>.table-responsive+.panel-body {
    border-top: 1px solid #ddd;
  }

  .panel>.table>tbody:first-child>tr:first-child th,
  .panel>.table>tbody:first-child>tr:first-child td {
    border-top: 0;
  }

  .panel>.table-bordered,
  .panel>.table-responsive>.table-bordered {
    border: 0;
  }

  .panel>.table-bordered>thead>tr>th:first-child,
  .panel>.table-responsive>.table-bordered>thead>tr>th:first-child,
  .panel>.table-bordered>tbody>tr>th:first-child,
  .panel>.table-responsive>.table-bordered>tbody>tr>th:first-child,
  .panel>.table-bordered>tfoot>tr>th:first-child,
  .panel>.table-responsive>.table-bordered>tfoot>tr>th:first-child,
  .panel>.table-bordered>thead>tr>td:first-child,
  .panel>.table-responsive>.table-bordered>thead>tr>td:first-child,
  .panel>.table-bordered>tbody>tr>td:first-child,
  .panel>.table-responsive>.table-bordered>tbody>tr>td:first-child,
  .panel>.table-bordered>tfoot>tr>td:first-child,
  .panel>.table-responsive>.table-bordered>tfoot>tr>td:first-child {
    border-left: 0;
  }

  .panel>.table-bordered>thead>tr>th:last-child,
  .panel>.table-responsive>.table-bordered>thead>tr>th:last-child,
  .panel>.table-bordered>tbody>tr>th:last-child,
  .panel>.table-responsive>.table-bordered>tbody>tr>th:last-child,
  .panel>.table-bordered>tfoot>tr>th:last-child,
  .panel>.table-responsive>.table-bordered>tfoot>tr>th:last-child,
  .panel>.table-bordered>thead>tr>td:last-child,
  .panel>.table-responsive>.table-bordered>thead>tr>td:last-child,
  .panel>.table-bordered>tbody>tr>td:last-child,
  .panel>.table-responsive>.table-bordered>tbody>tr>td:last-child,
  .panel>.table-bordered>tfoot>tr>td:last-child,
  .panel>.table-responsive>.table-bordered>tfoot>tr>td:last-child {
    border-right: 0;
  }

  .panel>.table-bordered>thead>tr:first-child>td,
  .panel>.table-responsive>.table-bordered>thead>tr:first-child>td,
  .panel>.table-bordered>tbody>tr:first-child>td,
  .panel>.table-responsive>.table-bordered>tbody>tr:first-child>td,
  .panel>.table-bordered>thead>tr:first-child>th,
  .panel>.table-responsive>.table-bordered>thead>tr:first-child>th,
  .panel>.table-bordered>tbody>tr:first-child>th,
  .panel>.table-responsive>.table-bordered>tbody>tr:first-child>th {
    border-bottom: 0;
  }

  .panel>.table-bordered>tbody>tr:last-child>td,
  .panel>.table-responsive>.table-bordered>tbody>tr:last-child>td,
  .panel>.table-bordered>tfoot>tr:last-child>td,
  .panel>.table-responsive>.table-bordered>tfoot>tr:last-child>td,
  .panel>.table-bordered>tbody>tr:last-child>th,
  .panel>.table-responsive>.table-bordered>tbody>tr:last-child>th,
  .panel>.table-bordered>tfoot>tr:last-child>th,
  .panel>.table-responsive>.table-bordered>tfoot>tr:last-child>th {
    border-bottom: 0;
  }

  .panel>.table-responsive {
    margin-bottom: 0;
    border: 0;
  }

  .panel-group {
    margin-bottom: 20px;
  }

  .panel-group .panel {
    margin-bottom: 0;
    border-radius: 4px;
  }

  .panel-group .panel+.panel {
    margin-top: 5px;
  }

  .panel-group .panel-heading {
    border-bottom: 0;
  }

  .panel-group .panel-heading+.panel-collapse>.panel-body,
  .panel-group .panel-heading+.panel-collapse>.list-group {
    border-top: 1px solid #ddd;
  }

  .panel-group .panel-footer {
    border-top: 0;
  }

  .panel-group .panel-footer+.panel-collapse .panel-body {
    border-bottom: 1px solid #ddd;
  }

  .panel-default {
    border-color: #ddd;
  }

  .panel-default>.panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
  }

  .panel-default>.panel-heading+.panel-collapse>.panel-body {
    border-top-color: #ddd;
  }

  .panel-default>.panel-heading .badge {
    color: #f5f5f5;
    background-color: #333;
  }

  .panel-default>.panel-footer+.panel-collapse>.panel-body {
    border-bottom-color: #ddd;
  }

  .panel-primary {
    border-color: #337ab7;
  }

  .panel-primary>.panel-heading {
    color: #fff;
    background-color: #337ab7;
    border-color: #337ab7;
  }

  .panel-primary>.panel-heading+.panel-collapse>.panel-body {
    border-top-color: #337ab7;
  }

  .panel-primary>.panel-heading .badge {
    color: #337ab7;
    background-color: #fff;
  }

  .panel-primary>.panel-footer+.panel-collapse>.panel-body {
    border-bottom-color: #337ab7;
  }

  .panel-success {
    border-color: #d6e9c6;
  }

  .panel-success>.panel-heading {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
  }

  .panel-success>.panel-heading+.panel-collapse>.panel-body {
    border-top-color: #d6e9c6;
  }

  .panel-success>.panel-heading .badge {
    color: #dff0d8;
    background-color: #3c763d;
  }

  .panel-success>.panel-footer+.panel-collapse>.panel-body {
    border-bottom-color: #d6e9c6;
  }

  .panel-info {
    border-color: #bce8f1;
  }

  .panel-info>.panel-heading {
    color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;
  }

  .panel-info>.panel-heading+.panel-collapse>.panel-body {
    border-top-color: #bce8f1;
  }

  .panel-info>.panel-heading .badge {
    color: #d9edf7;
    background-color: #31708f;
  }

  .panel-info>.panel-footer+.panel-collapse>.panel-body {
    border-bottom-color: #bce8f1;
  }

  .panel-warning {
    border-color: #faebcc;
  }

  .panel-warning>.panel-heading {
    color: #8a6d3b;
    background-color: #fcf8e3;
    border-color: #faebcc;
  }

  .panel-warning>.panel-heading+.panel-collapse>.panel-body {
    border-top-color: #faebcc;
  }

  .panel-warning>.panel-heading .badge {
    color: #fcf8e3;
    background-color: #8a6d3b;
  }

  .panel-warning>.panel-footer+.panel-collapse>.panel-body {
    border-bottom-color: #faebcc;
  }

  .panel-danger {
    border-color: #ebccd1;
  }

  .panel-danger>.panel-heading {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
  }

  .panel-danger>.panel-heading+.panel-collapse>.panel-body {
    border-top-color: #ebccd1;
  }

  .panel-danger>.panel-heading .badge {
    color: #f2dede;
    background-color: #a94442;
  }

  .panel-danger>.panel-footer+.panel-collapse>.panel-body {
    border-bottom-color: #ebccd1;
  }
</style>
<section class="home_banner_area">

  <div class="container">
    <br />
    <br />
    <br />
    <br />
    <div class="page-header">
      <h1>Pendaftaran Pelamar</h1>
    </div>
    <div class="col-lg-12">

      <div class="row">
        <div class="panel panel-default">

          <div class="panel-heading">Masukan Identitas Anda</div>
          <div class="panel-body">
            <?php echo form_open() ?>

            <div class="errors">
              <?php
              //            dump($nilaiUniversitas);
              //            dump($dataView);
              //            foreach ($nilaiUniversitas as $item => $value) {
              //                echo $value->nilai;
              //            }
              $errors = $this->session->flashdata('message');
              if (isset($errors)) {
              ?>

                <div class="alert alert-success alert-dismissable">
                  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                  <?php echo $errors; ?>
                </div>

              <?php } ?>
            </div>

            <div class="row">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="form-inline">
                    <table width="100%" align="center">
                      <div class="form-group">
                        <tr>
                          <td>

                            <label for="nik">NIK</label>
                          </td>
                          <td>
                            <input name="nik" type="text" class="form-control" id="nik" minlength="16" maxlength="16" onkeypress="return hanyaAngka(event)" required="" placeholder="Masukan NIK">
                          </td>
                        </tr>
                      </div>
                      <div class="form-group">
                        <tr>
                          <td>

                            <label for="nama">Nama Lengkap</label>
                          </td>
                          <td>
                            <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukan Nama Lengkap" required="">
                          </td>
                        </tr>
                      </div>
                      <div class="form-group">
                        <tr>
                          <td>

                            <label for="alamat">Alamat</label>
                          </td>
                          <td>
                            <input name="alamat" type="text" class="form-control" id="alamat" placeholder="Masukan Alamat" required="">
                          </td>
                        </tr>
                      </div>
                      <div class="form-group">
                        <tr>
                          <td>

                            <label for="notelp">No. Telepon</label>
                          </td>
                          <td>
                            <input name="notelp" type="text" class="form-control" id="notelp" maxlength="12" placeholder="Masukan No. Telepon" required="">
                          </td>
                        </tr>

                      </div>

                      <div class="form-group">
                        <tr>
                          <td>

                            <label for="notelp">Posisi</label>
                          </td>
                          <td>

                            <select name="posisi" id="posisi" class="form-control">
                              <option value="Sales">Sales</option>
                              <option value="Sopir">Sopir</option>
                              <option value="SPV">SPV</option>
                              <option value="Admin">Admin</option>
                            </select>

                          </td>
                        </tr>

                      </div>
                    </table>

                    <div class="form-group">
                      <button class="btn btn-success" type="submit">Kirim</button>

                    </div>
                  </div>
                </div>
              </div>




            </div>
            <?php echo form_close() ?>
          </div>
          </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>
</section>
<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
    return true;
  }
</script>