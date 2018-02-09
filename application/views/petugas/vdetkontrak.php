<?php $this->load->view('header_petugas');?>
<?php
  foreach($qkontrak as $rowdata){
    $ID_KONTRAK=$rowdata->ID_KONTRAK;
    $TGL_KONTRAK=$rowdata->TGL_KONTRAK;
    $PERIHAL=$rowdata->PERIHAL;
    $PIHAK_KEDUA=$rowdata->PIHAK_KEDUA;
    $JENIS_PENAGIHAN=$rowdata->JENIS_PENAGIHAN;
  }
?>
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b>Detail Kontak</b></div>
  <div class="panel-body">

     <p> <a href="<?=base_url()?>petugas_kontrak" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i> Kembali</a>
     </p>

       <table class="table table-striped">
         <tr>
          <td>No Kontrak</td>
          <td><?php echo $ID_KONTRAK?></td>
          </tr>
         <tr>
          <td>Tanggal Kontrak</td>
          <td><?php echo $TGL_KONTRAK?></td>
          </tr>
         <tr>
          <td>Perihal</td>
          <td><?php echo $PERIHAL?></td>
          </tr>
         <tr>
          <td>Pihak Kedua</td>
          <td><?php echo $PIHAK_KEDUA?></td>
          </tr>
         <tr>
          <td>Jenis Penagihan</td>
          <td><?php echo $JENIS_PENAGIHAN?></td>
           </tr>
         <tr>
          <td>Syarat Pembayaran <a href="<?=base_url()?>petugas_syarat/detail_edit/<?php echo base64_encode($ID_KONTRAK) ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-pencil"></i></a></td>
          <?php
          if (empty($qsyarat)) {
            echo "<td> Tidak ada Syarat </td>";
          } else {
            echo "<td>";
            $i=1;
          foreach ($qsyarat as $row) {
            echo $i.". ".$row->LAMPIRAN;
            if ($row->KETERANGAN_SYARAT == "") {
              echo "";
            } else {
              echo " (".$row->KETERANGAN_SYARAT.")";;
            }
            echo "<br>";
            $i++;
          }
          echo "</td>";
          echo "</tr>";
        }
          ?>
         </tr>
         <tr>
          <td>Upah Pekerja <a href="<?=base_url()?>petugas_upah/awal/<?php echo base64_encode($ID_KONTRAK) ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-pencil"></i></a></td>
          <?php
          if (empty($qupah)) {
            echo "<td> Tidak ada upah pekerja </td>";
          } else {
            $i=0;
            $jumlah_desimal ="0";
            $pemisah_desimal =",";
            $pemisah_ribuan =".";
          foreach ($qupah as $row) {
            $i++;
            echo "<td> <pre> Upah Pekerja ".$i;
            echo "<br> Upah                       : ";
            $angka = $row->UPAH;
            echo "Rp ".number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan).",-";
            echo "<br> Tunjangan                  : ";
            $angka = $row->TUNJANGAN;
            echo "Rp ".number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan).",-";
            echo "<br> BPJS Kesehatan             : ";
            $angka = $row->BPJS_KESEHATAN;
            echo "Rp ".number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan).",-";
            echo "<br> Jaminan Kematian           : ";
            $angka = $row->JAMINAN_KEMATIAN;
            echo "Rp ".number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan).",-";
            echo "<br> Jaminan Hari Tua           : ";
            $angka = $row->JAMINAN_HARI_TUA;
            echo "Rp ".number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan).",-";
            echo "<br> Jaminan Kecelakaan Kerja   : ";
            $angka = $row->JAMINAN_KECELAKAAN_KERJA;
            echo "Rp ".number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan).",-";
            echo "<br> Jaminan Pensiun            : ";
            $angka = $row->JAMINAN_PENSIUN;
            echo "Rp ".number_format($angka, $jumlah_desimal, $pemisah_desimal, $pemisah_ribuan).",-";
            echo "</pre> </td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td> </td>";
          }
          echo "<td></td>";
        }
          ?>
         </tr>
       </table>
        </div>
    </div>    <!-- /panel -->

  </div> <!-- /container -->
<?php $this->load->view('footer');?>