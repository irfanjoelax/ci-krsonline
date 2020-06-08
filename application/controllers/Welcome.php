<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	//! function construct
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	//! function index
	public function index()
	{
		// proses validasi
		$this->form_validation->set_rules(
			'nim',
			'NIM',
			'required|trim|numeric',
			array(
				'required' => '%s tidak boleh kosong.',
				'numeric' => 'Masukkan %s NIM dengan benar.'
			)
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required|trim',
			array(
				'required' => '%s tidak boleh kosong.'
			)
		);

		// proses eksekusi
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('v_login');
		} else {
			$this->_login();
		}
	}

	//! function proses login sistem
	private function _login()
	{
		$nim      = $this->input->post('nim', TRUE);
		$password   = $this->input->post('password', TRUE);

		$user = $this->m_mahasiswa->get_where_nim(['nim_mhs'   => $nim]);

		if ($user) {
			// cek password
			if (password_verify($password, $user['pass_mhs'])) {

				if ($user['nim_mhs'] == 1) {
					$level = 1;
				} else {
					$level = 2;
				}

				$data_session = array(
					'nim_mhs'	=> $user['nim_mhs'],
					'fklt_id'   => $user['fklt_id'],
					'prd_id'   	=> $user['prd_id'],
					'nama_mhs'  => $user['nama_mhs'],
					'status'		=> 'login',
					'level'		=> $level
				);

				var_dump($this->session->set_userdata($data_session));

				if ($level == 1) {
					redirect(site_url('admin/beranda'));
				} else  if ($level == 2) {
					redirect(site_url('mahasiswa/beranda'));
				}
			} else {
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Ooppps !</strong> Password anda salah silakan coba lagi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect(site_url('/'));
			}
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Ooppps !</strong> anda belum terdaftar pada sistem, silakan kontak Admin<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect(site_url('/'));
		}
	}

	//! fungsi logout sistem
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('/'));
	}

	//! fungsi ubah password
	public function ubah_password()
	{
		// cek session login
		$session = $this->session->userdata('role_id');

		if (empty($session)) {
			redirect(site_url('/'));
		} else {
			$this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|min_length[6]|matches[password2]', [
				'required' => "%s harus diisi.",
				'matches' => "Password baru dan ulangi password harus sama.",
				'min_length' => "%s minimal 6 karakter."
			]);
			$this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]', [
				'required' => "%s harus diisi.",
				'matches' => "Password baru dan ulangi password harus sama."
			]);

			if ($this->form_validation->run() == FALSE) {
				if ($session == 1) {
					// load view modular
					$this->load->view('templates/header');
					$this->load->view('templates/sidebar_admin');
					$this->load->view('v_change_password');
					$this->load->view('templates/footer');
				} elseif ($session == 2) {
					// load view modular
					$this->load->view('templates/header');
					$this->load->view('templates/sidebar_operator');
					$this->load->view('v_change_password');
					$this->load->view('templates/footer');
				}
			} else {
				$id_user = $this->session->userdata('id_user');
				$update  = $this->user_model->go_update_password($id_user);

				if ($update) {
					$where = array(
						'id_user'   => $id_user,
					);

					$user = $this->user_model->get_where($where);

					$data_session = array(
						'id_user'      => $user['id_user'],
						'name_user'    => $user['name_user'],
						'email_user'   => $user['email_user'],
						'img_user'     => $user['img_user'],
						'role_id'      => $user['role_id'],
					);

					$this->session->set_userdata($data_session);

					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Selamat !</strong> Password anda berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

					if ($user['role_id'] == 1) {
						redirect(site_url('admin/dashboard'));
					} else  if ($user['role_id'] == 2) {
						redirect(site_url('operator/dashboard'));
					}
				}
			}
		}
	}
}
