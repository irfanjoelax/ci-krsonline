 <!doctype html>
 <html lang="en">

 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <title><?= TITLE ?></title>
 </head>

 <body>
    <!-- navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white border-bottom shadow py-3">
       <div class="container">
          <span class="navbar-brand mb-0 h1">
             <img src="<?= base_url('asset/favicon.png') ?>" width="70" height="55" class="d-inline-block align-middle mr-3" alt="<?= base_url('asset/favicon.png') ?>">
             <?= TITLE ?>
          </span>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
             <div class="navbar-nav ml-auto">
                <?php
                  $c = $this->uri->segment(1);
                  $m = $this->uri->segment(2);

                  // cek level login ?
                  if ($this->session->userdata('level') == 1) {
                  ?>
                   <a class="nav-item nav-link ml-2 <?php if ($c == 'admin' and $m == 'beranda') echo 'active font-weight-bold text-success' ?>" href="<?= site_url('admin/beranda') ?>">
                      <i class="zmdi zmdi-layers mr-1"></i>&nbsp;Beranda
                   </a>
                   <a class="nav-item nav-link ml-2 <?php if ($c == 'admin' and $m == 'fakultas') echo 'active font-weight-bold text-success' ?>" href="<?= site_url('admin/fakultas') ?>">
                      <i class="zmdi zmdi-balance mr-1"></i>&nbsp;Fakultas
                   </a>
                   <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="zmdi zmdi-settings mr-1"></i>&nbsp;Pengaturan
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         <a class="dropdown-item" href="#">
                            <i class="zmdi zmdi-lock mr-1"></i>&nbsp;Ubah Password
                         </a>
                         <a class="dropdown-item" href="<?= site_url('welcome/logout') ?>">
                            <i class="zmdi zmdi-close-circle mr-1"></i>&nbsp;Keluar
                         </a>
                      </div>
                   </li>
                <?php } else if ($this->session->userdata('level') == 2) { ?>
                   <a class="nav-item nav-link ml-2 <?php if ($c == 'mahasiswa' and $m == 'beranda') echo 'active font-weight-bold text-success' ?>" href="#">
                      <i class="zmdi zmdi-layers mr-1"></i>&nbsp;Beranda
                   </a>
                   <a class="nav-item nav-link ml-2 <?php if ($c == 'mahasiswa' and $m == 'krs') echo 'active font-weight-bold text-success' ?>" href="#">
                      <i class="zmdi zmdi-receipt mr-1"></i>&nbsp;Kartu Rancangan Studi
                   </a>
                   <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="zmdi zmdi-settings mr-1"></i>&nbsp;Pengaturan
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                         <a class="dropdown-item" href="#">
                            <i class="zmdi zmdi-lock mr-1"></i>&nbsp;Ubah Password
                         </a>
                         <a class="dropdown-item" href="<?= site_url('welcome/logout') ?>">
                            <i class="zmdi zmdi-close-circle mr-1"></i>&nbsp;Keluar
                         </a>
                      </div>
                   </li>
                <?php } else {
                  } ?>
             </div>
          </div>
       </div>
    </nav>
    <!-- end navbar -->

    <!-- konten -->
    <main class="mt-5">