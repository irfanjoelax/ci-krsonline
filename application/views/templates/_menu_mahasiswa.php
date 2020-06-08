<a class="nav-item nav-link ml-2 <?php if ($c == 'mahasiswa' and $m == 'beranda') echo 'active font-weight-bold text-success' ?>" href="#">
   <i class="zmdi zmdi-layers mr-1"></i>&nbsp;Beranda
</a>
<a class="nav-item nav-link ml-2 <?php if ($c == 'mahasiswa' and $m == 'krs') echo 'active font-weight-bold text-success' ?>" href="#">
   <i class="zmdi zmdi-receipt mr-1"></i>&nbsp;Kartu Rancangan Studi
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