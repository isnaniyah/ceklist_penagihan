<?php $this->load->view('header_petugas');
    if($aksi=='aksi_add'){
        $ID_CEKLIST="";
        $ID_DATA_CEKLIST="";
        $ID_SYARAT="";
        $STATUS="";
        $KETERANGAN="";
    }else{
     foreach($qceklist as $rowdata){
        $ID_CEKLIST=$rowdata->ID_CEKLIST;
        $ID_DATA_CEKLIST=$ID_DATA_CEKLIST;
        $ID_SYARAT=$ID_SYARAT;
        $STATUS=$rowdata->STATUS;
        $KETERANGAN=$rowdata->KETERANGAN;
  }
}

?>
<div class="container">
      <!-- Main component for a primary marketing message or call to action -->
<div class="panel panel-default">
  <div class="panel-heading"><b>Form Data Ceklist</b></div>
  <div class="panel-body">
  <?php echo $this->session->flashdata('pesan');
    ?>
     <form action="<?=base_url()?>petugas_ceklist/form/<?=$aksi?>" method="post">
       <table class="table table-hover">
        <?php if(empty($qsyarat)){ ?>
         <tr>
          <td colspan="4">Data tidak ditemukan</td>
         </tr>
        <?php }else{ ?>
        <tr>
          <th>No.</th>
          <th>Syarat</th>
          <th>Status</th>
          <th>Keterangan</th>
        </tr>
       <?php
       $i=0;
       foreach ($qsyarat as $row) {
        $ID_DATA_CEKLIST=$row->ID_DATA_CEKLIST;
        $ID_SYARAT=$row->ID_SYARAT;
        $LAMPIRAN=$row->LAMPIRAN;
        $KETERANGAN_SYARAT=$row->KETERANGAN_SYARAT;?>
        <input type="hidden" name="ID_CEKLIST[]" class="form-control" value="<?php echo $ID_CEKLIST?>">
        <input type="hidden" name="ID_DATA_CEKLIST[]" class="form-control" value="<?php echo $ID_DATA_CEKLIST?>">
        <input type="hidden" name="ID_SYARAT[]" class="form-control" value="<?php echo $ID_SYARAT?>">
        <tr>
          <td>
            <?php echo $i+1?>
          </td>
          <td>
            <?php echo $LAMPIRAN."<br><hr>".$KETERANGAN_SYARAT;?>
          </td>
          <td>
              <div class="radio">
                <label><input type="radio" name="STATUS[<?php echo $i?>]" value="Lengkap">Lengkap</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="STATUS[<?php echo $i?>]" value="Kurang lengkap">Kurang lengkap</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="STATUS[<?php echo $i?>]" value="Tidak ada">Tidak ada</label>
              </div>
          </td>
          <td>
            <div class="col-sm-8">
              <textarea  name="KETERANGAN[]" class="form-control"></textarea>
            </div>
          </td>
        </tr>
         <?php $i++;
                 } ?>
         <tr>
          <td colspan="4">
            <input type="submit" class="btn btn-success" value="Simpan">
            <a href="javascript:window.history.go(-1);" class="btn btn-default">Batal</button>
          </td>
         </tr>
         <?php } ?>
         <p> <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i> Kembali</a>
       </table>
     </form>
        </div>
    </div>    <!-- /panel -->

    </div> <!-- /container -->
<?php $this->load->view('footer');?>