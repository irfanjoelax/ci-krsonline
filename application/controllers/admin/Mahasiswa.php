<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

   //! function construct
   public function __construct()
   {
      parent::__construct();

      $this->load->library('form_validation');
      $this->load->helper('bcrypt');

      if ($this->session->userdata('level') != 1) {
         return redirect(site_url('/'));
      }
   }

   //! fungsi index controller
   public function index()
   {
      $parsing['mahasiswas'] = $this->m_mahasiswa->getAllData();
      $this->load->view('admin/mahasiswa/v_read', $parsing);
   }

   //! fungsi create data
   public function tambah()
   {
      // jika gagal
      if ($this->form_validation->run('mahasiswa') == FALSE) {
         $parsing['fakultas'] = $this->m_fakultas->getAllData();
         $this->load->view('admin/mahasiswa/v_create', $parsing);
      }
      // jika berhasil
      else {
         // proses data
         $data = array(
            'nim_mhs'  => $this->input->post('nim', TRUE),
            'nama_mhs' => strtoupper($this->input->post('nama', TRUE)),
            'fklt_id'  => $this->input->post('fklt_id', TRUE),
            'prd_id'   => $this->input->post('prd_id', TRUE),
            'pass_mhs' => password_hash('123456', PASSWORD_DEFAULT),
         );
         $this->m_mahasiswa->goInsertData($data);
         // flash message
         $this->session->set_flashdata('notif', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>selamat !</strong> data mahasiswa telah berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         // redirect halaman
         redirect(site_url('admin/mahasiswa'));
      }
   }

   //! fungsi edit data
   public function ubah($id)
   {
      // decrypt id
      $id_code = bcrypt_decode($id, 9);
      // jika gagal atau load pertama
      if ($this->form_validation->run('mahasiswa') == FALSE) {
         $parsing['fakultas'] = $this->m_fakultas->getAllData();
         $parsing['prodi']    = $this->m_prodi->getAllData();
         $parsing['mhs']      = $this->m_mahasiswa->getIdData($id_code);
         $this->load->view('admin/mahasiswa/v_edit', $parsing);
      }
      // jika berhasil
      else {
         // proses data
         $data = array(
            'nama_mhs' => strtoupper($this->input->post('nama', TRUE)),
            'fklt_id'  => $this->input->post('fklt_id', TRUE),
            'prd_id'   => $this->input->post('prd_id', TRUE),
         );
         $this->m_mahasiswa->goUpdateData($id_code, $data);
         // flash message
         $this->session->set_flashdata('notif', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>selamat !</strong> data mahasiswa telah berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         // redirect halaman
         redirect(site_url('admin/mahasiswa'));
      }
   }

   //! fungsi delete data
   public function hapus($id)
   {
      // decrypt id
      $id_code = bcrypt_decode($id, 9);
      // proses data
      $this->m_mahasiswa->goDeleteData($id_code);
      // flash message
      $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>selamat !</strong> data mahasiswa telah berhasil dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      // redirect halaman
      redirect(site_url('admin/mahasiswa'));
   }
}

/* End of file Mahasiswa.php */
