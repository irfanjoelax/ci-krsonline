<?php $this->load->view('templates/header') ?>

<div class="container">
   <div class="row">
      <div class="col-sm-10 mx-auto">
         <?= $this->session->flashdata('notif') ?>
         <div class="card shadow">
            <div class="card-body">
               <h5 class="card-title">
                  Master Data Program Studi
                  <a href="<?= site_url('admin/prodi/tambah') ?>" class="btn btn-sm btn-primary float-right">Tambah Prodi</a>
               </h5>
               <hr>
               <table class="table table-sm table-bordered" width="100%">
                  <thead>
                     <tr class="text-center">
                        <th width="40">#</th>
                        <th>Nama Prodi</th>
                        <th width="300">Fakultas</th>
                        <th width="150">Tombol Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $no = 1;
                     foreach ($prodi as $prd) : ?>
                        <tr class="text-center">
                           <td><?= $no++ ?></td>
                           <td><?= $prd->nama_prd ?></td>
                           <td><?= $prd->nama_fklt ?></td>
                           <td>
                              <a href="<?= site_url('admin/prodi/ubah/' . bcrypt_encode($prd->id_prd)) ?>" class="btn btn-sm btn-warning">ubah</a>
                              <a href="<?= site_url('admin/prodi/hapus/' . bcrypt_encode($prd->id_prd)) ?>" class="btn btn-sm btn-danger">hapus</a>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

<?php $this->load->view('templates/footer') ?>