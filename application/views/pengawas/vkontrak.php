<?php $this->load->view('header_pengawas');?>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b>Daftar Kontrak</b></div>
  <div class="panel-body">
  <p><?php echo $this->session->flashdata('pesan')?> </p>
  <div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?=base_url()?>pengawas_kontrak/search" method="post">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Masukkan no kontrak" name="ID_KONTRAK">
      </div>
      <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
  </div>
       <table class="table table-striped">
        <thead>
         <tr>
         <th>NO KONTRAK</th>
         <th>TGL KONTRAK</th>
         <th>PERIHAL</th>
         <th>PIHAK KEDUA</th>
         <th>JENIS PENAGIHAN</th>
         <th></th>
         </tr>
        </thead>
        <tbody>
        <?php if(empty($qkontrak)){ ?>
         <tr>
          <td colspan="7">Data tidak ditemukan</td>
         </tr>
        <?php }else{
          foreach($qkontrak as $row){?>
         <tr>
          <td><?php echo $row->ID_KONTRAK ?></td>
          <td><?php echo $row->TGL_KONTRAK ?></td>
          <td><?php echo $row->PERIHAL ?></td>
          <td><?php echo $row->PIHAK_KEDUA ?></td>
          <td><?php echo $row->JENIS_PENAGIHAN ?></td>
          <td>
          <?php $ID_KONTRAK2=base64_encode($row->ID_KONTRAK);?>
           <a href="<?=base_url()?>pengawas_kontrak/detail/<?php echo $ID_KONTRAK2 ?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-search"></i></a>
          </td>
         </tr>
        <?php }}?>
        </tbody>
       </table>
        </div>
    </div>    <!-- /panel -->

    </div> <!-- /container -->
<?php $this->load->view('footer');?>