<?php $this->load->view('header');?>
<div class="container">
      <!-- Main component for a primary marketing message or call to action -->
  <div class="panel-heading"><b>Daftar Syarat</b></div>
  <div class="panel-body">
    <p><?php echo $this->session->flashdata('pesan')?> </p>
    <?php 
      foreach($qkontrak as $row){
        $ID_KONTRAK2 = $row->ID_KONTRAK;
        $ID_KONTRAK=base64_encode($ID_KONTRAK2);
      }
      ?>
      <a href="<?=base_url()?>admin_syarat/form/add/<?php echo $keterangan ?>/<?php echo $ID_KONTRAK ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>

       <table class="table table-striped">
        <thead>
         <tr>
         <th>LAMPIRAN</th>
         <th>KETERANGAN</th>
         <th></th>
         </tr>
        </thead>
        <tbody>
        <?php if(empty($qsyarat)){ ?>
         <tr>
          <td colspan="4">Data tidak ditemukan</td>
         </tr>
        <?php }else{
          foreach($qsyarat as $row){?>
         <tr>
          <td><?php echo $row->LAMPIRAN ?></td>
          <td><?php echo $row->KETERANGAN_SYARAT ?></td>
          <td>
           <a href="<?=base_url()?>admin_syarat/form/edit/<?php echo $keterangan ?>/<?php echo $row->ID_SYARAT ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
           <a href="<?=base_url()?>admin_syarat/hapus/<?php echo $row->ID_SYARAT ?>/<?php echo $ID_KONTRAK ?>/<?php echo $keterangan ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
          </td>
         </tr>
        <?php } }?>
        </tbody>
       </table>
        </div>
        <?php if($keterangan=='next'){ ?>
          <a href="<?=base_url()?>admin_upah/awal/<?php echo $ID_KONTRAK ?>" class="btn btn-sm btn-primary">Next</a>
        <?php }else{ ?>
          <a href="<?=base_url()?>admin_kontrak/detail/<?php echo $ID_KONTRAK ?>" class="btn btn-sm btn-primary">Kembali</a>
        <?php } ?>
    </div>
    </div>
<?php $this->load->view('footer');?>