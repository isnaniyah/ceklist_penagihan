<?php $this->load->view('header_petugas');?>
<?php
if($aksi=='aksi_add'){
    $ID_DATA_CEKLIST="";
    $NO_PEMBAYARAN="";
    $PERIODE="";
    $STATUS_PEKERJAAN="";
    $TGL_ACC="";
    foreach($qkontrak as $rowdata){
      $ID_KONTRAK = $rowdata->ID_KONTRAK;
    }
}else{
 foreach($qcekdata as $rowdata){
    $ID_DATA_CEKLIST=$rowdata->ID_DATA_CEKLIST;
    $ID_KONTRAK=$rowdata->ID_KONTRAK;
    $NO_PEMBAYARAN=$rowdata->NO_PEMBAYARAN;
    $PERIODE=$rowdata->PERIODE;
    $STATUS_PEKERJAAN=$rowdata->STATUS_PEKERJAAN;
    $TGL_ACC=$rowdata->TGL_ACC;
  }
}

?>
<div class="container">
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
  <div class="panel-heading"><b>Form Data Penagihan</b></div>
  <div class="panel-body">
  <?php echo $this->session->flashdata('pesan')?>
     <form action="<?=base_url()?>petugas_cekdata/form/<?=$aksi?>" method="post">
       <table class="table table-striped">
       <input type="hidden" name="ID_DATA_CEKLIST" class="form-control" value="<?php echo $ID_DATA_CEKLIST?>">
       <input type="hidden" name="ID_KONTRAK" class="form-control" value="<?php echo $ID_KONTRAK?>">
         <tr>
          <td>Pembayaran ke-</td>
          <td>
          <div class="col-sm-2">
            <input type="text" name="NO_PEMBAYARAN" class="form-control" value="<?php echo $NO_PEMBAYARAN?>" required>
          </div>
          </td>
         </tr>
       <tr>
          <td>Periode</td>
          <td>
           <div class="col-sm-4">
            <input type="text" name="PERIODE" class="form-control" value="<?php echo $PERIODE?>" required>
            </div>
           </td>
         </tr>
       <tr>
          <td>Status Pekerjaan</td>
          <td>
           <div class="col-sm-4">
            <input type="text" name="STATUS_PEKERJAAN" class="form-control" value="<?php echo $STATUS_PEKERJAAN?>">
            </div>
           </td>
         </tr>
         <tr>
          <td>Tanggal Acc</td>
          <td>
           <div class="col-sm-4">
            <input type="date" name="TGL_ACC" class="form-control" value="<?php echo $TGL_ACC?>">
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