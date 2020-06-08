<a class="nav-item nav-link ml-2 <?php if ($c == 'admin' and $m == 'beranda') echo 'active font-weight-bold text-success' ?>" href="<?= site_url('admin/beranda') ?>">
   <i class="zmdi zmdi-layers mr-1"></i>&nbsp;Beranda
</a>
<a class="nav-item nav-link ml-2 <?php if ($c == 'admin' and $m == 'fakultas') echo 'active font-weight-bold text-success' ?>" href="<?= site_url('admin/fakultas') ?>">
   <i class="zmdi zmdi-balance mr-1"></i>&nbsp;Fakultas
</a>
<a class="nav-item nav-link ml-2 <?php if ($c == 'admin' and $m == 'prodi') echo 'active font-weight-bold text-success' ?>" href="<?= site_url('admin/prodi') ?>">
   <i class="zmdi zmdi-graduation-cap mr-1"></i>&nbsp;Prodi
</a>
<li class="nav-item dropdown">
   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="zmdi zmdi-settings mr-1"></i>&nbsp;Pengaturan
   </a>
   <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
      <a class="dropdown-item" href="#">
         <i class="zmdi zmdi-lock mr-1"></i>&nbsp;Ubah Password
      </a>
      <a class="dropdown-item" href="<?= site_url('welcome/logout') ?>">
         <i class="zmdi zmdi-close-circle mr-1"></i>&nbsp;Keluar
      </a>
   </div>
</li>