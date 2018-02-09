<?php $this->load->view('header');?>
<?php
if($aksi=='aksi_add'){
    $ID_UMK="";
    $NAMA_DAERAH="";
    $UMK="";
}else{
 foreach($qumk as $rowdata){
    $ID_UMK=$rowdata->ID_UMK;
    $NAMA_DAERAH=$rowdata->NAMA_DAERAH;
    $UMK=$rowdata->UMK;
  }
}

?>
<div class="container">
<div class="panel panel-default">
  <div class="panel-heading"><b>Form Data UMK</b></div>
  <div class="panel-body">
  <?php echo $this->session->flashdata('pesan')?>
     <form action="<?=base_url()?>admin_umk/form/<?=$aksi?>" method="post">
       <table class="table table-striped">
       <input type="hidden" name="ID_UMK" class="form-control" value="<?php echo $ID_UMK?>">
         <tr>
          <td>Nama Daerah</td>
          <td>
            <div class="col-sm-4">
                <input type="text" name="NAMA_DAERAH" class="form-control" value="<?php echo $NAMA_DAERAH?>" required>
          </div>
          </td>
         </tr>
         <tr>
          <td>UMK</td>
          <td>
          <div class="col-sm-3">
            <input type="text" name="UMK" class="form-control" value="<?php echo $UMK?>" required>
          </div>
          </td>
         </tr>
         <tr>
          <td colspan="2">
            <input type="submit" class="btn btn-success" value="Simpan">
            <a href="<?=base_url()?>admin_umk" class="btn btn-default">Batal</button>
          </td>
         </tr>
       </table>
     </form>
        </div>
    </div>    <!-- /panel -->

    </div> <!-- /container -->
<?php $this->load->view('footer');?>