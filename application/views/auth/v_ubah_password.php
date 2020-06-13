<?php $this->load->view('templates/header') ?>

<div class="container">
   <div class="row">
      <div class="col-sm-5 mx-auto">
         <?= $this->session->flashdata('notif') ?>
         <div class="card shadow">
            <div class="card-body">
               <h5 class="card-title">Ubah Password</h5>
               <hr>
               <form method="POST" action="<?= site_url('auth/ubah-password') ?>">
                  <div class="form-group">
                     <label for="pass1">Password baru</label>
                     <input type="password" class="form-control" name="pass1" placeholder="masukkan password baru">
                     <?= form_error('pass1', '<small class="text-danger pl-1">', '</small>') ?>
                  </div>
                  <div class="form-group">
                     <label for="pass2">Ulang Password</label>
                     <input type="password" class="form-control" name="pass2" placeholder="ulangi password">
                     <?= form_error('pass2', '<small class="text-danger pl-1">', '</small>') ?>
                  </div>
                  <button type="submit" class="btn btn-sm btn-primary">Ubah Password</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php $this->load->view('templates/footer') ?>