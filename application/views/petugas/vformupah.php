<?php $this->load->view('header_petugas');?>
<?php
if($aksi=='aksi_add'){
    $ID_UPAH = "";
    $select="";
    $UMK = "";
    $UPAH = "10";
    $TUNJANGAN = "1";
    $BPJS_KESEHATAN = "4";
    $JAMINAN_KEMATIAN = "0.3";
    $JAMINAN_HARI_TUA = "3.7";
    $JAMINAN_KECELAKAAN_KERJA = "";
    $JAMINAN_PENSIUN = "2";
    $per="(%)";
    foreach($qkontrak as $rowdata){
      $ID_KONTRAK=$rowdata->ID_KONTRAK;
    }
}else{
  $per="";
  $select="selected";
  foreach ($qupah as $rowdata) {
    $ID_UPAH=$rowdata->ID_UPAH;
    $ID_KONTRAK=$rowdata->ID_KONTRAK;
    $UMK=$rowdata->UMK;
    $UPAH=$rowdata->UPAH;
    $TUNJANGAN=$rowdata->TUNJANGAN;
    $BPJS_KESEHATAN=$rowdata->BPJS_KESEHATAN;
    $JAMINAN_KEMATIAN=$rowdata->JAMINAN_KEMATIAN;
    $JAMINAN_HARI_TUA=$rowdata->JAMINAN_HARI_TUA;
    $JAMINAN_KECELAKAAN_KERJA=$rowdata->JAMINAN_KECELAKAAN_KERJA;
    $JAMINAN_PENSIUN=$rowdata->JAMINAN_PENSIUN;
  }
}

?>
<div class="container">
<div class="panel panel-default">
  <div class="panel-heading"><b>Form Data Upah</b></div>
  <div class="panel-body">
  <?php echo $this->session->flashdata('pesan')?>
     <form action="<?=base_url()?>petugas_upah/form/<?=$aksi?>" method="post">
       <table class="table table-striped">
       <input type="hidden" name="ID_UPAH" class="form-control" value="<?php echo $ID_UPAH?>">
       <input type="hidden" name="ID_KONTRAK" class="form-control" value="<?php echo $ID_KONTRAK?>">
         <tr>
            <?php if ($aksi=='aksi_edit') { ?>
              <td>UMK</td>
              <td>
              <div class="col-sm-3">
              <input type="text" name="UMK" class="form-control" value="<?php echo $UMK?>">
          <?php }else{ ?>
              <td>Nama Daerah</td>
              <td>
              <div class="col-sm-3">
              <select class="form-control" name="UMK">
              <?php foreach ($qumk as $rowdata) {
                echo '<option value="'.$rowdata->UMK.'" >'.$rowdata->NAMA_DAERAH.'</option>';
                }
                echo '</select>';
            } ?>
          </div>
          </td>
         </tr>
         <tr>
          <td>Upah <?php echo $per?></td>
          <td>
          <div class="col-sm-3">
            <input type="text" name="UPAH" class="form-control" value="<?php echo $UPAH?>">
          </div>
          </td>
         </tr>
         <tr>
          <td>Tunjangan <?php echo $per?></td>
          <td>
          <div class="col-sm-3">
            <input type="text" name="TUNJANGAN" class="form-control" value="<?php echo $TUNJANGAN?>">
          </div>
          </td>
         </tr>
         <tr>
          <td>BPJS Kesehatan <?php echo $per?></td>
          <td>
          <div class="col-sm-3">
            <input type="text" name="BPJS_KESEHATAN" class="form-control" value="<?php echo $BPJS_KESEHATAN?>">
          </div>
          </td>
         </tr>
         <tr>
          <td>Jaminan Kematian <?php echo $per?></td>
          <td>
          <div class="col-sm-3">
            <input type="text" name="JAMINAN_KEMATIAN" class="form-control" value="<?php echo $JAMINAN_KEMATIAN?>">
          </div>
          </td>
         </tr>
         <tr>
          <td>Jaminan Hari Tua <?php echo $per?></td>
          <td>
          <div class="col-sm-3">
            <input type="text" name="JAMINAN_HARI_TUA" class="form-control" value="<?php echo $JAMINAN_HARI_TUA?>">
          </div>
          </td>
         </tr>
         <tr>
          <td>Jaminan Kecelakaan Kerja <?php echo $per?></td>
          <td>
          <div class="col-sm-3">
            <input type="text" name="JAMINAN_KECELAKAAN_KERJA" class="form-control" value="<?php echo $JAMINAN_KECELAKAAN_KERJA?>">
          </div>
          </td>
         </tr>
         <tr>
          <td>Jaminan Pensiun <?php echo $per?></td>
          <td>
          <div class="col-sm-3">
            <input type="text" name="JAMINAN_PENSIUN" class="form-control" value="<?php echo $JAMINAN_PENSIUN?>">
          </div>
          </td>
         </tr>
         <tr>
          <td colspan="2">
            <input type="submit" class="btn btn-success" value="Simpan">
            <a href="javascript:window.history.go(-1);" class="btn btn-default">Batal</button>
          </td>
         </tr>
       </table>
     </form>
        </div>
    </div>
    </div>
<?php $this->load->view('footer');?>