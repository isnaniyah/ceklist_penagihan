<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Log-in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" >
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/css/login.css'); ?>" rel="stylesheet">
    </head>

<body>
  <h2>Ceklist Kelengkapan Penagihan
    <br>PT PLN (PERSERO) Distribusi Jawa Timur</h2>
  <div class="ribbon"></div>
  <div class="login">
  <h1><img src="<?=base_url()?>assets/css/Logo.png" class="img-rounded" width="80" height="100"></h1>
  <br><br>
  <form action="<?php echo base_url('auth/cek_login'); ?>" method="post">
      <div class="blockinput">
        <i class="glyphicon glyphicon-user"></i><input type="text" name="NIP" placeholder="NIP">
      </div>
      <div class="blockinput">
      <br>
        <i class="glyphicon glyphicon-lock"></i><input type="password" name="PASSWORD" placeholder="Password">
      </div>
    <button>Login</button>
  </form>
  </div>
  <div class="notif">
  <p><?php echo $this->session->flashdata('pesan')?> </p>
  </div>
  <br><br>
</body>