<?php $this->load->view('header');?>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b>Daftar UMK</b></div>
  <div class="panel-body">
    <p><?php echo $this->session->flashdata('pesan')?> </p>
      <a href="admin_umk/form/add" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>

       <table class="table table-striped">
        <thead>
         <tr>
         <th>Nama Daerah</th>
         <th>UMK</th>
         <th></th>
         </tr>
        </thead>
        <tbody>
        <?php if(empty($qumk)){ ?>
         <tr>
          <td colspan="3">Data tidak ditemukan</td>
         </tr>
        <?php }else{

            $jumlah_desimal ="0";
            $pemisah_desimal =",";
            $pemisah_ribuan =".";
          foreach($qumk as $row){?>
         <tr>
          <td><?php echo $row->NAMA_DAERAH ?></td>
          <td><?php $angka = $row->UMK;
            echo "Rp ".number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan).",-";?></td>
          <td>
           <a href="<?=base_url()?>admin_umk/form/edit/<?php echo $row->ID_UMK ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
           <a href="<?=base_url()?>admin_umk/hapus/<?php echo $row->ID_UMK ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
          </td>
         </tr>
        <?php } }?>
        </tbody>
       </table>
        </div>
    </div>    <!-- /panel -->

    </div> <!-- /container -->
<?php $this->load->view('footer');?>