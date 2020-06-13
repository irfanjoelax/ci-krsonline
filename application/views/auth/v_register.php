<?php $this->load->view('templates/header') ?>

<div class="container">
   <div class="row">
      <div class="col-sm-7 mx-auto">
         <div class="card shadow">
            <div class="card-body">
               <h5 class="card-title">
                  Register Mahasiswa
               </h5>
               <hr>
               <form action="<?= site_url('auth/register') ?>" method="post">
                  <div class="form-group">
                     <label for="nim">NIM</label>
                     <input type="text" class="form-control" name="nim" placeholder="masukkan nim mahasiswa" value="<?= set_value('nim') ?>">
                     <?= form_error('nim', '<small class="text-danger pl-1">', '</small>') ?>
                  </div>
                  <div class="form-group">
                     <label for="nama">Nama Mahasiswa</label>
                     <input type="text" class="form-control" name="nama" placeholder="masukkan nama mahasiswa" value="<?= set_value('nama') ?>">
                     <?= form_error('nama', '<small class="text-danger pl-1">', '</small>') ?>
                  </div>
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label for="fklt_id">Fakultas</label>
                           <select name="fklt_id" id="fklt_id" class="form-control">
                              <option value="">--pilih fakultas--</option>
                              <?php foreach ($fakultas as $fklt) : ?>
                                 <option value="<?= $fklt->id_fklt ?>"><?= $fklt->nama_fklt ?></option>
                              <?php endforeach; ?>
                           </select>
                           <?= form_error('fklt_id', '<small class="text-danger pl-1">', '</small>') ?>
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <label for="prd_id">Program Studi</label>
                           <select name="prd_id" id="prd_id" class="form-control">
                              <option value="">--pilih program studi--</option>
                           </select>
                           <?= form_error('prd_id', '<small class="text-danger pl-1">', '</small>') ?>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="email">Email</label>
                     <input type="text" class="form-control" name="email" placeholder="masukkan email mahasiswa" value="<?= set_value('email') ?>">
                     <?= form_error('email', '<small class="text-danger pl-1">', '</small>') ?>
                  </div>
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label for="pass1">Password</label>
                           <input type="password" class="form-control" name="pass1" placeholder="masukkan password">
                           <?= form_error('pass1', '<small class="text-danger pl-1">', '</small>') ?>
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <label for="pass2">Ulangi Password</label>
                           <input type="password" class="form-control" name="pass2" placeholder="ulang password">
                           <?= form_error('pass2', '<small class="text-danger pl-1">', '</small>') ?>
                        </div>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-sm btn-success">D A F T A R</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php $this->load->view('templates/footer') ?>