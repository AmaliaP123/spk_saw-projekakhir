<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cetak Data Pelamar</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png" />
    
</head>

<body onload="window.print()">
  <style type="text/css" media="print"> 
  @page { size:auto; margin:0; font-family: arial narrow; } 
</style>
    <table width=100% align="center" border="0" style="width:95%; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
  <tr>
   
    <td>
<div align="center"><strong>
  <h2 class="center">PT. MITRA GEMILANG INTI PERKASA</b></h1>
    <h3 class="center">LAPORAN DATA PELAMAR</h2>
  </strong>
</div></td></tr></table>
    <table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" class="table table-striped table-bordered table-hover" id="dynamic-table">
        <thead>
            <tr border="1px">
                <th>No</th>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            foreach ($pelamar as $row) : ?>
                <tr>
                    <td align="center"><?= ++$no ?></td>
                    <td><?= $row->nik ?></td>
                    <td><?= $row->nama ?></td>
                    <td><?= $row->alamat ?></td>
                    <td><?= $row->notelp ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
                    <p>&nbsp;</p>
<table width="95%" align="center">
  <tr> 
    <td>&nbsp;</td>
    <td width="300">
<div align="center"><b>Pekalongan, 
        <?php echo date('d F Y');?>
        </b></div></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td width="200"><div align="center"><b>MANAGER</b></div></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td height="70"><div align="center"></div></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td><div align="center"><b>( .................................... )</b></div></td>
  </tr>
</table> 
</body>

</html>