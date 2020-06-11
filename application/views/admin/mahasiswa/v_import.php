<?php $this->load->view('templates/header') ?>

<div class="container">
   <div class="row">
      <div class="col-sm-7 mx-auto">
         <div class="card shadow">
            <div class="card-body">
               <h5 class="card-title">
                  Import Data Mahasiswa
                  <a href="<?= site_url('admin/mahasiswa/') ?>" class="btn btn-sm btn-secondary float-right">Kembali</a>
               </h5>
               <hr>
               <form action="<?= site_url('admin/mahasiswa/upload_excel') ?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                     <label for="file">File Import Excel</label>
                     <input type="file" class="form-control" name="file">
                     <?= form_error('file', '<small class="text-danger pl-1">', '</small>') ?>
                  </div>
                  <button type="submit" class="btn btn-sm btn-success">Simpan</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php $this->load->view('templates/footer') ?>