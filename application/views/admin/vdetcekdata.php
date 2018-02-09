<?php $this->load->view('header');?>
<?php
 foreach($qcekdata as $rowdata){
    $ID_DATA_CEKLIST=$rowdata->ID_DATA_CEKLIST;
    $ID_KONTRAK=$rowdata->ID_KONTRAK;
    $NO_PEMBAYARAN=$rowdata->NO_PEMBAYARAN;
    $PERIODE=$rowdata->PERIODE;
    $STATUS_PEKERJAAN=$rowdata->STATUS_PEKERJAAN;
    $TGL_ACC=$rowdata->TGL_ACC;
  }
?>
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b>Detail Data Penagihan</b></div>
  <div class="panel-body">
  <?php $ID_KONTRAK2=base64_encode($ID_KONTRAK);?>
     <p> <a href="<?=base_url()?>admin_kontrak/detail/<?php echo $ID_KONTRAK2 ?>" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i> Kembali</a>
     </p>

       <table class="table table-striped">
         <tr>
          <td>ID Data Ceklist</td>
          <td><?php echo $ID_DATA_CEKLIST?></td>
         </tr>
         <tr>
          <td>ID Kontrak</td>
          <td><?php echo $ID_KONTRAK?></td>
          </tr>
         <tr>
          <td>Tagihan ke-</td>
          <td><?php echo $NO_PEMBAYARAN?></td>
          </tr>
         <tr>
          <td>Periode</td>
          <td><?php echo $PERIODE?></td>
          </tr>
         <tr>
          <td>Status Pekerjaan</td>
          <td><?php echo $STATUS_PEKERJAAN?></td>
          </tr>
         <tr>
          <td>Tanggal Acc</td>
          <td><?php echo $TGL_ACC?></td>
           </tr>

       </table>
        </div>
    </div>    <!-- /panel -->
    </div> <!-- /container -->
<?php $this->load->view('footer');?>