<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	//! function construct
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	//! function index login
	public function index()
	{
		if ($this->form_validation->run('login') == FALSE) {
			$this->load->view('auth/v_login');
		} else {
			$this->_login();
		}
	}

	//! function proses login sistem
	private function _login()
	{
		// tangkap inputan
		$nim      	= $this->input->post('nim', TRUE);
		$password   = $this->input->post('password', TRUE);

		// init variabel dari database
		$user = $this->m_mahasiswa->getWhereNim(['nim_mhs'   => $nim]);

		// jika data ditemukan
		if ($user) {
			// jika sudah teraktifasi
			if ($user['is_active'] == 1) {
				// cek password jika sama
				if (password_verify($password, $user['pass_mhs'])) {

					// pembuatan level user login
					if ($user['nim_mhs'] == 1) {
						$level = 1;
					} else {
						$level = 2;
					}

					// pembuatan session login
					$data_session = array(
						'nim_mhs'	=> $user['nim_mhs'],
						'fklt_id'   => $user['fklt_id'],
						'prd_id'   	=> $user['prd_id'],
						'nama_mhs'  => $user['nama_mhs'],
						'level'		=> $level
					);

					$this->session->set_userdata($data_session);

					// redirect halaman setelah login
					if ($level == 1) {
						redirect(site_url('admin/beranda'));
					} else  if ($level == 2) {
						redirect(site_url('mahasiswa/beranda'));
					}
				}
				// jika password berbeda
				else {
					$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Ooppps !</strong> Password anda salah silakan coba lagi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect(site_url('/'));
				}
			}
			// jika belum teraktifasi
			else {
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Ooppps !</strong> silakan cek email untuk aktifasi akun.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect(site_url('/'));
			}
		}
		// jika data tidak ditemukan
		else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Ooppps !</strong> anda belum terdaftar pada sistem, silakan kontak Admin<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect(site_url('/'));
		}
	}

	//! fungsi logout sistem
	public function logout()
	{
		// hapus semua session
		$this->session->sess_destroy();
		// flash message
		$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Terimakasih !</strong> anda telah mengakhiri sesi anda<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		// redirect ke halaman login
		redirect(site_url('/'));
	}

	//! fungsi lupa password
	public function lupa_password()
	{
		// jika validasi gagal
		if ($this->form_validation->run('lupa_password') == FALSE) {
			$this->load->view('auth/v_lupa_password');
		}
		// jika validasi berhasil
		else {
			// ambil data mahasiswa
			$email = $this->input->post('email', TRUE);
			$user = $this->db->get_where('mahasiswa', ['email_mhs' => $email, 'is_active' => 1])->row_array();

			// jika email user ada
			if ($user) {
				// generate token aktifasi
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email_tkn' 	=> $this->input->post('email', TRUE),
					'token'			=> $token,
					'time_tkn'		=> time()
				];
				// proses data
				$this->db->insert('token', $user_token);
				// kirim email
				$this->_sendEmail($token, 'forget');
				// flash message
				$this->session->set_flashdata('notif', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Informasi !</strong> silakan cek email anda untuk reset password.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				// redirect kehalaman
				redirect(site_url('auth/lupa-password'));
			}
			// jika email user tidak ada
			else {
				// flash message
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Ooppss !</strong> email tidak terdaftar atau belum aktif.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				// redirect kehalaman
				redirect(site_url('auth/lupa-password'));
			}
		}
	}

	//! fungsi register mahasiswa
	public function register()
	{
		// jika validasi gagal
		if ($this->form_validation->run('register') == FALSE) {
			$parsing['fakultas'] = $this->m_fakultas->getAllData();
			$this->load->view('auth/v_register', $parsing);
		}
		// jika validasi berhasil
		else {
			// proses data
			$data = array(
				'nim_mhs'  	=> $this->input->post('nim', TRUE),
				'nama_mhs' 	=> strtoupper($this->input->post('nama', TRUE)),
				'email_mhs' => $this->input->post('email', TRUE),
				'fklt_id'  	=> $this->input->post('fklt_id', TRUE),
				'prd_id'   	=> $this->input->post('prd_id', TRUE),
				'pass_mhs' 	=> password_hash($this->input->post('pass1', TRUE), PASSWORD_DEFAULT),
				'is_active' => 0,
				'time_mhs'  => date('Y-m-d H:i:s')
			);

			// generate token aktifasi
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email_tkn' 	=> $this->input->post('email', TRUE),
				'token'			=> $token,
				'time_tkn'		=> time()
			];

			// proses database
			$this->m_mahasiswa->goInsertData($data);
			$this->db->insert('token', $user_token);

			// kirim email
			$this->_sendEmail($token, 'verify');
			// flash message
			$this->session->set_flashdata('notif', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Informasi !</strong> silakan cek email anda untuk aktifasi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			// redirect kehalaman
			redirect(site_url('/'));
		}
	}

	//! fungsi private untuk kirim email
	private function _sendEmail($token, $tipe)
	{
		$this->load->library('email');

		$this->email->from('irfanwebdev02@gmail.com', 'Irfan Web Developer');
		$this->email->to($this->input->post('email', TRUE));

		// jika kirim email tipe verifikasi
		if ($tipe == 'verify') {
			$this->email->subject('Verifikasi Akun');
			$this->email->message('Silakan klik link di bawah ini untuk verifikasi akun anda: <br> <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">AKTIFKAN AKUN SAYA</a>');
		}
		// jika kirim email tipe lupa password
		else if ($tipe == 'forget') {
			$this->email->subject('Reset Password');
			$this->email->message('Silakan klik link di bawah ini untuk reset password anda: <br> <a href="' . base_url() . 'auth/reset_password?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">RESET PASSWORD</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	//! fungsi verifikasi token
	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		// ambil data mahasiswa
		$user = $this->db->get_where('mahasiswa', ['email_mhs' => $email])->row_array();

		// jika email user benar
		if ($user) {
			$user_token = $this->db->get_where('token', ['token' => $token])->row_array();

			// jika token benar
			if ($user_token) {
				// kadaluarsa token selama sehari
				if (time() - $user_token['time_tkn'] < 60 * 60 * 24) {
					// ubah data aktif mahasiswa
					$this->db->set('is_active', 1);
					$this->db->where('email_mhs', $email);
					$this->db->update('mahasiswa');
					// hapus data token
					$this->db->delete('token', ['email_tkn' => $email]);
					// flash message
					$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Selamat !</strong> akun anda sudah terdaftar disistem<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					// redirect kehalaman
					redirect(site_url('/'));
				}
				// jika kadaluarsa
				else {
					// hapus data
					$this->db->delete('mahasiswa', ['email_mhs' => $email]);
					$this->db->delete('token', ['email_tkn' => $email]);
					// flash message
					$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Ooopps !</strong> token kadaluarsa.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					// redirect kehalaman
					redirect(site_url('/'));
				}
			}
			// jika token salah
			else {
				// flash message
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Ooopps !</strong> Kesalahan pada token aktifasi.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				// redirect kehalaman
				redirect(site_url('/'));
			}
		}
		// jika email user salah
		else {
			// flash message
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Ooopps !</strong> Kesalahan pada email aktifasi.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			// redirect kehalaman
			redirect(site_url('/'));
		}
	}

	//! fungsi reset password login
	public function reset_password()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		// ambil data mahasiswa
		$user = $this->db->get_where('mahasiswa', ['email_mhs' => $email])->row_array();

		// jika email user benar
		if ($user) {
			$user_token = $this->db->get_where('token', ['token' => $token])->row_array();

			// jika token benar
			if ($user_token) {
				// kadaluarsa token selama sehari
				if (time() - $user_token['time_tkn'] < 60 * 60 * 24) {
					// buat session untuk ubah password					
					$this->session->set_userdata('reset_email', $email);
					// redirect kehalaman ubah password
					$this->ubah_password();
				}
				// jika kadaluarsa
				else {
					// hapus data
					$this->db->delete('mahasiswa', ['email_mhs' => $email]);
					$this->db->delete('token', ['email_tkn' => $email]);
					// flash message
					$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Ooopps !</strong> token kadaluarsa.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					// redirect kehalaman
					redirect(site_url('/'));
				}
			}
			// jika token salah
			else {
				// flash message
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Ooopps !</strong> Kesalahan pada token reset password.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				// redirect kehalaman
				redirect(site_url('/'));
			}
		}
		// jika email user salah
		else {
			// flash message
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Ooopps !</strong> Kesalahan pada email reset password.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			// redirect kehalaman
			redirect(site_url('/'));
		}
	}

	//! fungsi ubah password
	public function ubah_password()
	{
		// tangkap session login
		$email_reset = $this->session->userdata('reset_email');

		// cek jika session email ada
		if ($email_reset) {
			// jika validasi gagal
			if ($this->form_validation->run('ubah_password') == FALSE) {
				$this->load->view('auth/v_ubah_password');
			}
			// jika validasi berhasil
			else {
				// proses data
				$data = array(
					'pass_mhs' 	=> password_hash($this->input->post('pass1', TRUE), PASSWORD_DEFAULT),
				);
				$update  = $this->m_mahasiswa->goUpdateData($id_user, $data);
				$this->db->where('email_mhs', $email_reset);
				$this->db->update('mahasiswa', $data);
				// hapus session reset email
				$this->session->unset_userdata('reset_email');

				// flash message
				$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Selamat !</strong> Password anda berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				// redirect halaman setelah login
				redirect(site_url('/'));
			}
		}
		// jika session email tidak ada
		else {
			// jika validasi gagal
			if ($this->form_validation->run('ubah_password') == FALSE) {
				$this->load->view('auth/v_ubah_password');
			}
			// jika validasi berhasil
			else {
				$id_user = $this->session->userdata('nim_mhs');
				$data = array(
					'nim_mhs'  	=> $id_user,
					'pass_mhs' 	=> password_hash($this->input->post('pass1', TRUE), PASSWORD_DEFAULT),
				);
				$update  = $this->m_mahasiswa->goUpdateData($id_user, $data);

				if ($update) {
					$user = $this->m_mahasiswa->getWhereNim(['nim_mhs'   => $id_user]);

					// pembuatan level user login
					if ($user['nim_mhs'] == 1) {
						$level = 1;
					} else {
						$level = 2;
					}

					// pembuatan session login
					$data_session = array(
						'nim_mhs'	=> $user['nim_mhs'],
						'fklt_id'   => $user['fklt_id'],
						'prd_id'   	=> $user['prd_id'],
						'nama_mhs'  => $user['nama_mhs'],
						'reset_email' => $user['email_mhs'],
						'level'		=> $level
					);

					$this->session->set_userdata($data_session);

					// flash message
					$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Selamat !</strong> Password anda berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

					// redirect halaman setelah login
					redirect(site_url('auth/ubah-password'));
				}
			}
		}
	}
}
