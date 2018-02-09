    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b>Daftar Data Penagihan</b></div>
  <div class="panel-body">
    <p><?php echo $this->session->flashdata('pesan')?> </p>
    <?php foreach($qkontrak as $row){
      $ID_KONTRAK2 = $row->ID_KONTRAK;
      $ID_KONTRAK=base64_encode($ID_KONTRAK2);
      }?>
       <table class="table table-striped">
        <thead>
         <tr>
         <th>Penagihan ke-</th>
         <th>Periode</th>
         <th>Status Pekerjaan</th>
         <th>Tanggal Acc</th>
         <th></th>
         </tr>
        </thead>
        <tbody>
        <?php if(empty($qcekdata)){ ?>
         <tr>
          <td colspan="6">Data tidak ditemukan</td>
         </tr>
        <?php }else{
          foreach($qcekdata as $row){?>
         <tr>
          <td><?php echo $row->NO_PEMBAYARAN ?></td>
          <td><?php echo $row->PERIODE ?></td>
          <td><?php echo $row->STATUS_PEKERJAAN ?></td>
          <td><?php echo $row->TGL_ACC ?></td>
          <td>
           <a href="<?=base_url()?>pengawas_cekdata/detail/<?php echo $row->ID_DATA_CEKLIST ?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-search"></i></a>
          </td>
         </tr>
        <?php }}?>
        </tbody>
       </table>
        </div>
    </div>