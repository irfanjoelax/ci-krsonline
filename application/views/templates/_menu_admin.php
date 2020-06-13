<a class="nav-item nav-link ml-2 <?php if ($c == 'admin' and $m == 'beranda') echo 'active font-weight-bold text-success' ?>" href="<?= site_url('admin/beranda') ?>">
   <i class="zmdi zmdi-layers mr-1"></i>&nbsp;Beranda
</a>
<a class="nav-item nav-link ml-2 <?php if ($c == 'admin' and $m == 'fakultas') echo 'active font-weight-bold text-success' ?>" href="<?= site_url('admin/fakultas') ?>">
   <i class="zmdi zmdi-balance mr-1"></i>&nbsp;Fakultas
</a>
<a class="nav-item nav-link ml-2 <?php if ($c == 'admin' and $m == 'prodi') echo 'active font-weight-bold text-success' ?>" href="<?= site_url('admin/prodi') ?>">
   <i class="zmdi zmdi-graduation-cap mr-1"></i>&nbsp;Prodi
</a>
<a class="nav-item nav-link ml-2 <?php if ($c == 'admin' and $m == 'mahasiswa') echo 'active font-weight-bold text-success' ?>" href="<?= site_url('admin/mahasiswa') ?>">
   <i class="zmdi zmdi-library mr-1"></i>&nbsp;Mahasiswa
</a>
<a class="nav-item nav-link ml-2 <?php if ($c == 'auth' and $m == 'ubah-password') echo 'active font-weight-bold text-success' ?>" href="<?= site_url('auth/ubah-password') ?>">
   <i class="zmdi zmdi-shield-check mr-1"></i>&nbsp;Ubah Password
</a>
<a class="nav-item nav-link ml-2" href="<?= site_url('auth/logout') ?>">
   <i class="zmdi zmdi-sign-in mr-1"></i>&nbsp;Keluar
</a>