<?php $this->load->view('header_petugas');?>
<?php
if($aksi=='aksi_add'){
    $ID_KONTRAK="";
    $TGL_KONTRAK="";
    $PERIHAL="";
    $PIHAK_KEDUA="";
    $JENIS_PENAGIHAN="";
}else{
 foreach($qkontrak as $rowdata){
    $ID_KONTRAK=$rowdata->ID_KONTRAK;
    $TGL_KONTRAK=$rowdata->TGL_KONTRAK;
    $PERIHAL=$rowdata->PERIHAL;
    $PIHAK_KEDUA=$rowdata->PIHAK_KEDUA;
    $JENIS_PENAGIHAN=$rowdata->JENIS_PENAGIHAN;
  }
}
?>
<div class="container">
<div class="panel panel-default">
  <div class="panel-heading"><b>Form Data Kontrak</b></div>
  <div class="panel-body">
  <?php echo $this->session->flashdata('pesan')?>
     <form action="<?=base_url()?>petugas_kontrak/form/<?=$aksi?>" method="post">
       <table class="table table-striped">
         <tr>
          <td>No Kontrak</td>
          <td>
          <?php
          if($aksi=='aksi_add'){ ?>
            <div class="col-sm-6">
                <input type="text" name="ID_KONTRAK" class="form-control" value="<?php echo $ID_KONTRAK?>" required>
            </div>
            <?php }else{
              echo $ID_KONTRAK ?>
              <input type="hidden" name="ID_KONTRAK" class="form-control" value="<?php echo $ID_KONTRAK?>">
            <?php  }?>
            </td>
         </tr>
         <tr>
          <td>Tanggal Kontrak</td>
          <td>
            <div class="col-sm-3">
                <input type="date" name="TGL_KONTRAK" class="form-control" value="<?php echo $TGL_KONTRAK?>" required>
          </div>
          </td>
         </tr>
         <tr>
          <td>Perihal</td>
          <td>
          <div class="col-sm-6">
            <input type="text" name="PERIHAL" class="form-control" value="<?php echo $PERIHAL?>" required>
          </div>
          </td>
         </tr>
       <tr>
          <td>Pihak Kedua</td>
          <td>
           <div class="col-sm-5">
            <input type="text" name="PIHAK_KEDUA" class="form-control" value="<?php echo $PIHAK_KEDUA?>" required>
            </div>
           </td>
         </tr>
         <tr>
          <td>Jenis Penagihan</td>
          <td>
            <div class="col-sm-3">
            <select class="form-control" name="JENIS_PENAGIHAN">
              <option value="Multi Years" <?php if($aksi=="aksi_edit"){if($JENIS_PENAGIHAN=='Multi Years') {echo"selected";}}?> >Multi Years</option>
              <option value="Sekali Tagih" <?php if($aksi=="aksi_edit"){if($JENIS_PENAGIHAN=='Sekali Tagih') {echo"selected";}}?> >Sekali Tagih</option>
            </select>
            </div>
            </td>
         </tr>
         <tr>
          <td colspan="2">
            <input type="submit" class="btn btn-success" value="Simpan">
            <a href="<?=base_url()?>petugas_kontrak" class="btn btn-default">Batal</button>
          </td>
         </tr>
       </table>
     </form>
        </div>
    </div>
    </div>
<?php $this->load->view('footer');?>