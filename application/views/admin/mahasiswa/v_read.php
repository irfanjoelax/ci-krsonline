<?php $this->load->view('templates/header') ?>

<div class="container">
   <div class="row">
      <div class="col-sm-11 mx-auto">
         <?= $this->session->flashdata('notif') ?>
         <div class="card shadow">
            <div class="card-body">
               <h5 class="card-title">
                  Master Data Mahasiswa
                  <a href="<?= site_url('admin/mahasiswa/import') ?>" class="btn btn-sm btn-success float-right ml-1">Import Mahasiswa</a>
                  <a href="<?= site_url('admin/mahasiswa/tambah') ?>" class="btn btn-sm btn-primary float-right">Tambah Mahasiswa</a>
               </h5>
               <hr>
               <table class="table table-sm table-bordered dataTable" width="100%">
                  <thead>
                     <tr class="text-center">
                        <th width="20">#</th>
                        <th>Nama Mahasiswa</th>
                        <th width="180">Fakultas</th>
                        <th width="180">Program Studi</th>
                        <th width="120">Tombol Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $no = 1;
                     foreach ($mahasiswas as $mhs) : ?>
                        <tr class="text-center">
                           <td><?= $no++ ?></td>
                           <td><?= $mhs->nama_mhs ?></td>
                           <td><?= $mhs->nama_fklt ?></td>
                           <td><?= $mhs->nama_prd ?></td>
                           <td>
                              <a href="<?= site_url('admin/mahasiswa/ubah/' . bcrypt_encode($mhs->nim_mhs)) ?>" class="btn btn-sm btn-warning">ubah</a>
                              <a href="<?= site_url('admin/mahasiswa/hapus/' . bcrypt_encode($mhs->nim_mhs)) ?>" class="btn btn-sm btn-danger">hapus</a>
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