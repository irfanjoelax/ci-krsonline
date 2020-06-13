<a class="nav-item nav-link ml-2 <?php if ($c == '' and $m == '') echo 'active font-weight-bold text-success' ?>" href="<?= site_url('/') ?>">
   <i class="zmdi zmdi-lock-open mr-1"></i>&nbsp;Masuk
</a>
<a class="nav-item nav-link ml-2 <?php if ($c == 'auth' and $m == 'register') echo 'active font-weight-bold text-success' ?>" href="<?= site_url('auth/register') ?>">
   <i class="zmdi zmdi-assignment-account mr-1"></i>&nbsp;Register
</a>