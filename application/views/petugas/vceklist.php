<?php
 foreach($qcekdata as $rowdata){
    $ID_KONTRAK=$rowdata->ID_KONTRAK;
    $ID_DATA_CEKLIST=$rowdata->ID_DATA_CEKLIST;
  }
?>
    <div class="container">
      <div class="panel panel-default">
  <div class="panel-heading"><b>Daftar Data Ceklist</b></div>
  <div class="panel-body">
    <p><?php echo $this->session->flashdata('pesan')?> </p>
       <table class="table table-striped">
        <thead>
         <tr>
         <th> No </th>
         <th>Syarat</th>
         <th>Status</th>
         <th>Keterangan</th>
         <th></th>
         </tr>
        </thead>
        <tbody>
        <?php if(empty($qceklist)){
            ?>
        <a href="<?=base_url()?>petugas_ceklist/form/add/<?php echo base64_encode($ID_KONTRAK) ?>/<?php echo $ID_DATA_CEKLIST ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Mulai Ceklist Kelengkapan</a>
         <tr>
          <td colspan="4">Data tidak ditemukan</td>
         </tr>
        <?php }else{
          $i=0;
          foreach($qceklist as $row){
            $i++;?>
         <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row->LAMPIRAN ?></td>
          <td><?php echo $row->STATUS ?></td>
          <td><?php echo $row->KETERANGAN ?></td>
          <td>
          <a href="<?=base_url()?>petugas_ceklist/form/edit/<?php echo base64_encode($ID_KONTRAK) ?>/<?php echo $ID_DATA_CEKLIST ?>/<?php echo $row->ID_CEKLIST ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
          </td>
         </tr>
        <?php }} ?>
        </tbody>
       </table>
        </div>
    </div>