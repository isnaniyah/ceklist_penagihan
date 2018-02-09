<?php $this->load->view('header_petugas');
     foreach($qceklist as $rowdata){
        $ID_CEKLIST=$rowdata->ID_CEKLIST;
        $ID_DATA_CEKLIST=$rowdata->ID_DATA_CEKLIST;
        $ID_SYARAT=$rowdata->ID_SYARAT;
        $LAMPIRAN=$rowdata->LAMPIRAN;
        $KETERANGAN_SYARAT=$rowdata->KETERANGAN_SYARAT;
        $STATUS=$rowdata->STATUS;
        $KETERANGAN=$rowdata->KETERANGAN;
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
       <table class="table table-striped">
        <tr>
          <th>Syarat</th>
          <th>Status</th>
          <th>Keterangan</th>
        </tr>
       <input type="hidden" name="ID_CEKLIST" class="form-control" value="<?php echo $ID_CEKLIST?>">
       <input type="hidden" name="ID_DATA_CEKLIST" class="form-control" value="<?php echo $ID_DATA_CEKLIST?>">
       <input type="hidden" name="ID_SYARAT" class="form-control" value="<?php echo $ID_SYARAT?>">
       <tr>
          <td>
            <?php echo $LAMPIRAN."<br><hr>".$KETERANGAN_SYARAT;?>
          </td>
          <td>
              <div class="radio">
                <label><input type="radio" name="STATUS" value="Lengkap"<?php if ($STATUS == "Lengkap") { echo "checked";} ?> >Lengkap</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="STATUS" value="Kurang lengkap"<?php if ($STATUS == "Kurang lengkap") { echo "checked";} ?> >Kurang lengkap</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="STATUS" value="Tidak ada"<?php if ($STATUS == "Tidak ada") { echo "checked";} ?> >Tidak ada</label>
              </div>
          </td>
          <td>
            <div class="col-sm-8">
              <textarea  name="KETERANGAN" class="form-control" value="<?php echo $KETERANGAN?>"></textarea>
            </div>
          </td>
        </tr>
         <tr>
          <td colspan="3">
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