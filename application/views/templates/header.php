 <!doctype html>
 <html lang="en">

 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/dataTables.bootstrap4.min.css">
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
                  $parsing['c'] = $this->uri->segment(1);
                  $parsing['m'] = $this->uri->segment(2);

                  // cek level login ?
                  if ($this->session->userdata('level') == 1) {
                     $this->load->view('templates/_menu_admin', $parsing);
                  } else if ($this->session->userdata('level') == 2) {
                     $this->load->view('templates/_menu_mahasiswa', $parsing);
                  } else {
                     $this->load->view('templates/_menu_auth', $parsing);
                  }
                  ?>
             </div>
          </div>
       </div>
    </nav>
    <!-- end navbar -->

    <!-- konten -->
    <main class="mt-5">