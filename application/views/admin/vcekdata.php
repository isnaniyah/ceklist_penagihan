    <div class="container">
      <div class="panel panel-default">
  <div class="panel-heading"><b>Daftar Data Penagihan</b></div>
  <div class="panel-body">
    <p><?php echo $this->session->flashdata('pesan')?> </p>
    <?php foreach($qkontrak as $row){
      $ID_KONTRAK2 = $row->ID_KONTRAK;
      $ID_KONTRAK=base64_encode($ID_KONTRAK2);
      }?>
      <a href="<?=base_url()?>admin_cekdata/form/add/<?php echo $ID_KONTRAK ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
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
           <a href="<?=base_url()?>admin_cekdata/form/edit/<?php echo $row->ID_DATA_CEKLIST ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
           <a href="<?=base_url()?>admin_cekdata/detail/<?php echo $row->ID_DATA_CEKLIST ?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-search"></i></a>
           <a href="<?=base_url()?>admin_cekdata/hapus/<?php echo $row->ID_DATA_CEKLIST ?>/<?php echo $ID_KONTRAK ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
          </td>
         </tr>
        <?php }}?>
        </tbody>
       </table>
        </div>
    </div>