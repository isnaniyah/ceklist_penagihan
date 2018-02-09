<?php $this->load->view('header');?>
<div class="container">
      <!-- Main component for a primary marketing message or call to action -->
  <div class="panel-heading"><b>Daftar Upah</b></div>
  <div class="panel-body">
    <p><?php echo $this->session->flashdata('pesan')?> </p>
    <?php
      foreach($qkontrak as $row){
        $ID_KONTRAK2 = $row->ID_KONTRAK;
        $ID_KONTRAK=base64_encode($ID_KONTRAK2);
      }
      ?>
      <a href="<?=base_url()?>admin_upah/form/add/<?php echo $ID_KONTRAK ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
       <table class="table table-striped">
        <thead>
         <tr>
         <th>UMK</th>
         <th>UPAH</th>
         <th>TUNJANGAN</th>
         <th>JAMINAN KEMATIAN</th>
         <th>JAMINAN HARI TUA</th>
         <th>JAMINAN KECELAKAAN KERJA</th>
         <th>JAMINAN PENSIUN</th>
         </tr>
        </thead>
        <tbody>
        <?php if(empty($qupah)){ ?>
         <tr>
          <td colspan="7">Data tidak ditemukan</td>
         </tr>
        <?php }else{
            $jumlah_desimal ="0";
            $pemisah_desimal =",";
            $pemisah_ribuan =".";
          foreach($qupah as $row){?>
         <tr>
          <td><?php $angka = $row->UMK;
            echo "Rp ".number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan).",-";?></td>
          <td><?php $angka = $row->UPAH;
            echo "Rp ".number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan).",-";?></td>
          <td><?php $angka = $row->TUNJANGAN;
            echo "Rp ".number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan).",-";?></td>
          <td><?php $angka = $row->JAMINAN_KEMATIAN;
            echo "Rp ".number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan).",-";?></td>
          <td><?php $angka = $row->JAMINAN_HARI_TUA;
            echo "Rp ".number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan).",-";?></td>
          <td><?php $angka = $row->JAMINAN_KECELAKAAN_KERJA;
            echo "Rp ".number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan).",-";?></td>
          <td><?php $angka = $row->JAMINAN_PENSIUN;
            echo "Rp ".number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan).",-";?></td>
          <td>
           <a href="<?=base_url()?>admin_upah/form/edit/<?php echo $row->ID_UPAH ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
           <a href="<?=base_url()?>admin_upah/hapus/<?php echo $row->ID_UPAH ?>/<?php echo $ID_KONTRAK ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
          </td>
         </tr>
        <?php } }?>
        </tbody>
       </table>
        </div>
        <a href="<?=base_url()?>admin_kontrak/detail/<?php echo $ID_KONTRAK ?>" class="btn btn-sm btn-primary">Next</a>
    </div>
        </div>
<?php $this->load->view('footer');?>