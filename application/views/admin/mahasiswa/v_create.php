<?php $this->load->view('templates/header') ?>

<div class="container">
   <div class="row">
      <div class="col-sm-7 mx-auto">
         <div class="card shadow">
            <div class="card-body">
               <h5 class="card-title">
                  Tambah Data Mahasiswa
                  <a href="<?= site_url('admin/mahasiswa/') ?>" class="btn btn-sm btn-secondary float-right">Kembali</a>
               </h5>
               <hr>
               <form action="<?= site_url('admin/mahasiswa/tambah') ?>" method="post">
                  <div class="form-group">
                     <label for="nim">NIM</label>
                     <input type="text" class="form-control" name="nim" placeholder="masukkan nim mahasiswa">
                     <?= form_error('nim', '<small class="text-danger pl-1">', '</small>') ?>
                  </div>
                  <div class="form-group">
                     <label for="nama">Nama Mahasiswa</label>
                     <input type="text" class="form-control" name="nama" placeholder="masukkan nama mahasiswa">
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
                           <select name="prd_id" id="prd_id" class="form-control"></select>
                           <?= form_error('prd_id', '<small class="text-danger pl-1">', '</small>') ?>
                        </div>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php $this->load->view('templates/footer') ?>