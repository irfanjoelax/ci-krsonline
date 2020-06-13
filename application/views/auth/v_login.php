<?php $this->load->view('templates/header') ?>

<div class="container">
	<div class="row">
		<div class="col-sm-5 mx-auto">
			<?= $this->session->flashdata('notif') ?>
			<div class="card shadow">
				<div class="card-body">
					<h5 class="card-title">Halaman Masuk <?= TITLE ?></h5>
					<hr>
					<form method="POST" action="<?= site_url('auth') ?>">
						<div class="form-group row">
							<label for="nim" class="col-sm-3 col-form-label">NIM</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="nim" placeholder="masukkan NIM anda" value="<?= set_value('email') ?>">
								<?= form_error('nim', '<small class="text-danger pl-1">', '</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="password" class="col-sm-3 col-form-label">Password</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" name="password" placeholder="masukkan password anda">
								<?= form_error('password', '<small class="text-danger pl-1">', '</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-9 offset-sm-3">
								<button type="submit" class="btn btn-sm btn-success">
									<i class="zmdi zmdi-sign-in mr-1"></i>&nbsp;M A S U K
								</button>
								<a href="<?= site_url('auth/lupa-password') ?>" class="btn btn-sm btn-secondary">
									<i class="zmdi zmdi-help mr-1"></i>&nbsp;Lupa Password
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('templates/footer') ?>