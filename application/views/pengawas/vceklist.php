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
          </td>
         </tr>
        <?php }} ?>
        </tbody>
       </table>
        </div>
    </div>