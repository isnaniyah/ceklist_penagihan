<?php $this->load->view('header');?>
<?php
if($aksi=='aksi_add'){
    $ID_SYARAT="";
    $LAMPIRAN="";
    $KETERANGAN_SYARAT="";
    foreach($qkontrak as $rowdata){
      $ID_KONTRAK=$rowdata->ID_KONTRAK;
    }
}else{
 foreach($qsyarat as $rowdata){
    $ID_SYARAT=$rowdata->ID_SYARAT;
    $ID_KONTRAK=$rowdata->ID_KONTRAK;
    $LAMPIRAN=$rowdata->LAMPIRAN;
    $KETERANGAN_SYARAT=$rowdata->KETERANGAN_SYARAT;
  }
}

?>
<div class="container">
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
  <div class="panel-heading"><b>Form Data Syarat</b></div>
  <div class="panel-body">
  <?php echo $this->session->flashdata('pesan');?>
     <form action="<?=base_url()?>admin_syarat/form/<?=$aksi?>/<?=$keterangan?>" method="post">
       <table class="table table-striped">
       <input type="hidden" name="ID_SYARAT" class="form-control" value="<?php echo $ID_SYARAT?>">
       <input type="hidden" name="ID_KONTRAK" class="form-control" value="<?php echo $ID_KONTRAK?>">
         <tr>
          <td>Lampiran</td>
          <td>
            <div class="col-sm-6">
                <input type="text" name="LAMPIRAN" class="form-control" value="<?php echo $LAMPIRAN?>" required>
          </div>
          </td>
         </tr>
         <tr>
          <td>Keterangan</td>
          <td>
          <div class="col-sm-6">
            <textarea  name="KETERANGAN_SYARAT" class="form-control"><?php echo $KETERANGAN_SYARAT?></textarea>
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
    </div>    <!-- /panel -->

    </div> <!-- /container -->
<?php $this->load->view('footer');?>