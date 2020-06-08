<?php $this->load->view('header') ?>

<div class="container">
   <div class="row">
      <div class="col-sm-10 mx-auto">
         <?= $this->session->flashdata('notif') ?>
         <div class="card shadow">
            <div class="card-body">
               <h5 class="card-title">
                  Master Data Fakultas
                  <a href="<?= site_url('admin/fakultas/tambah') ?>" class="btn btn-sm btn-primary float-right">Tambah Fakultas</a>
               </h5>
               <hr>
               <table class="table table-sm table-bordered" width="100%">
                  <thead>
                     <tr class="text-center">
                        <th class="valign-middle" width="40">#</th>
                        <th class="valign-middle">Nama Fakultas</th>
                        <th class="valign-middle" width="150">Tombol Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $no = 1;
                     foreach ($fakultas as $fklt) : ?>
                        <tr class="text-center">
                           <td><?= $no++ ?></td>
                           <td><?= $fklt->nama_fklt ?></td>
                           <td>
                              <a href="<?= site_url('admin/fakultas/ubah/' . $fklt->id_fklt) ?>" class="btn btn-sm btn-warning">ubah</a>
                              <a href="<?= site_url('admin/fakultas/hapus/' . $fklt->id_fklt) ?>" class="btn btn-sm btn-danger">hapus</a>
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

<?php $this->load->view('footer') ?>