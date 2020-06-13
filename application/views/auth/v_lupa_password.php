<?php $this->load->view('templates/header') ?>

<div class="container">
   <div class="row">
      <div class="col-sm-7 mx-auto">
         <?= $this->session->flashdata('notif') ?>
         <div class="card shadow">
            <div class="card-body">
               <h5 class="card-title">Lupa Password</h5>
               <hr>
               <form method="POST" action="<?= site_url('auth/lupa-password') ?>">
                  <div class="form-group row">
                     <label for="email" class="col-sm-3 col-form-label">Email</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control" name="email" placeholder="masukkan email anda" value="<?= set_value('email') ?>">
                        <?= form_error('email', '<small class="text-danger pl-1">', '</small>') ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-sm btn-success">
                           <i class="zmdi zmdi-key mr-1"></i>&nbsp;Reset Password
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php $this->load->view('templates/footer') ?>