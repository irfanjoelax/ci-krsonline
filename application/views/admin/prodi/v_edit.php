<?php $this->load->view('templates/header') ?>

<div class="container">
   <div class="row">
      <div class="col-sm-7 mx-auto">
         <div class="card shadow">
            <div class="card-body">
               <h5 class="card-title">
                  Ubah Data Program Studi
                  <a href="<?= site_url('admin/prodi/') ?>" class="btn btn-sm btn-secondary float-right">Kembali</a>
               </h5>
               <hr>
               <form action="<?= site_url('admin/prodi/ubah/' . $prd->id_prd) ?>" method="post">
                  <div class="form-group">
                     <label for="nama">Nama Prodi</label>
                     <input type="text" class="form-control" name="nama" placeholder="masukkan nama prodi" value="<?= $prd->nama_prd ?>">
                     <?= form_error('nama', '<small class="text-danger pl-1">', '</small>') ?>
                  </div>
                  <div class="form-group">
                     <label for="fklt_id">Fakultas</label>
                     <select name="fklt_id" class="form-control">
                        <option value="">--pilih fakultas--</option>
                        <?php foreach ($fakultas as $fklt) : ?>
                           <option value="<?= $fklt->id_fklt ?>" <?php if ($prd->fklt_id == $fklt->id_fklt) echo 'selected' ?>>
                              <?= $fklt->nama_fklt ?>
                           </option>
                        <?php endforeach; ?>
                     </select>
                     <?= form_error('fklt_id', '<small class="text-danger pl-1">', '</small>') ?>
                  </div>
                  <button type="submit" class="btn btn-sm btn-warning">Simpan</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php $this->load->view('templates/footer') ?>