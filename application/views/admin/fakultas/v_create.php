<?php $this->load->view('templates/header') ?>

<div class="container">
   <div class="row">
      <div class="col-sm-7 mx-auto">
         <div class="card shadow">
            <div class="card-body">
               <h5 class="card-title">
                  Tambah Data Fakultas
                  <a href="<?= site_url('admin/fakultas/') ?>" class="btn btn-sm btn-secondary float-right">Kembali</a>
               </h5>
               <hr>
               <form action="<?= site_url('admin/fakultas/tambah') ?>" method="post">
                  <div class="form-group">
                     <label for="nama">Nama Fakultas</label>
                     <input type="text" class="form-control" name="nama" placeholder="masukkan nama fakultas">
                     <?= form_error('nama', '<small class="text-danger pl-1">', '</small>') ?>
                  </div>
                  <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php $this->load->view('templates/footer') ?>