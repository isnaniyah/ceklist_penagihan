<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="FaberNainggolan">
    <title><?=$title?></title>
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">

  </head>

  <body>
    <!-- Static navbar -->
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="brand-image"><img src="<?=base_url()?>assets/css/Logo.png" class="img-rounded" width="40" height="50"></div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?=base_url()?>home/admin"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="<?=base_url()?>admin_kontrak"><i class="glyphicon glyphicon-tasks"></i> Kontrak</a></li>
            <li><a href="<?=base_url()?>admin_umk"><i class="glyphicon glyphicon-book"></i> UMK </a></li>
            <li><a href="<?=base_url()?>admin_user"><i class="glyphicon glyphicon-cog"></i> Semua User </a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <?php
          $hari=date("l");
          $tanggal=date("d/m/Y");
          ?>
          <li><a><i class="glyphicon glyphicon-calendar"></i> <?php echo $hari.', '.$tanggal?> </a></li>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> User <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?=base_url()?>admin_user/user_byid"> Ubah Password </a></li>
                <li><a href="<?=base_url()?>auth/logout" onclick="return confirm('Anda yakin ingin keluar?')">Logout</a></li>
              </ul>
          </li>
          </ul>
        </div>
      </div>
    </nav>
