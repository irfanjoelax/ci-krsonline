<a class="nav-item nav-link ml-2 <?php if ($c == 'mahasiswa' and $m == 'beranda') echo 'active font-weight-bold text-success' ?>" href="#">
   <i class="zmdi zmdi-layers mr-1"></i>&nbsp;Beranda
</a>
<a class="nav-item nav-link ml-2 <?php if ($c == 'mahasiswa' and $m == 'krs') echo 'active font-weight-bold text-success' ?>" href="#">
   <i class="zmdi zmdi-receipt mr-1"></i>&nbsp;Kartu Rancangan Studi
</a>
<a class="nav-item nav-link ml-2 <?php if ($c == 'auth' and $m == 'ubah-password') echo 'active font-weight-bold text-success' ?>" href="<?= site_url('auth/ubah-password') ?>">
   <i class="zmdi zmdi-shield-check mr-1"></i>&nbsp;Ubah Password
</a>
<a class="nav-item nav-link ml-2" href="<?= site_url('auth/logout') ?>">
   <i class="zmdi zmdi-sign-in mr-1"></i>&nbsp;Keluar
</a>