<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas extends CI_Controller
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
      $parsing['fakultas'] = $this->m_fakultas->getAllData();

      $this->load->view('admin/fakultas/v_read', $parsing);
   }

   //! fungsi create data
   public function tambah()
   {
      // jika gagal
      if ($this->form_validation->run('fakultas') == FALSE) {
         $this->load->view('admin/fakultas/v_create');
      }
      // jika berhasil
      else {
         // proses data
         $data = array(
            'id_fklt'   => rand(11111, 49999),
            'nama_fklt' => strtoupper($this->input->post('nama', TRUE)),
            'time_fklt' => date('Y-m-d H:i:s')
         );
         $this->m_fakultas->goInsertData($data);
         // flash message
         $this->session->set_flashdata('notif', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>selamat !</strong> data fakultas telah berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         // redirect halaman
         redirect(site_url('admin/fakultas'));
      }
   }

   //! fungsi edit data
   public function ubah($id)
   {
      // decrypt id
      $id_code = bcrypt_decode($id);
      // jika gagal
      if ($this->form_validation->run('fakultas') == FALSE) {
         $parsing['fklt'] = $this->m_fakultas->getIdData($id_code);
         $this->load->view('admin/fakultas/v_edit', $parsing);
      }
      // jika berhasil
      else {
         // proses data
         $data = array(
            'nama_fklt' => strtoupper($this->input->post('nama', TRUE))
         );
         $this->m_fakultas->goUpdateData($id, $data);
         // flash message
         $this->session->set_flashdata('notif', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>selamat !</strong> data fakultas telah berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         // redirect halaman
         redirect(site_url('admin/fakultas'));
      }
   }

   //! fungsi edit data
   public function hapus($id)
   {
      // decrypt id
      $id_code = bcrypt_decode($id);
      // proses data
      $this->m_fakultas->goDeleteData($id_code);
      // flash message
      $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>selamat !</strong> data fakultas telah berhasil dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      // redirect halaman
      redirect(site_url('admin/fakultas'));
   }
}

/* End of file Admin/Fakultas.php */