<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{
   //! function construct
   public function __construct()
   {
      parent::__construct();

      $this->load->library('form_validation');

      if ($this->session->userdata('level') != 1) {
         return redirect(site_url('/'));
      }
   }

   //! fungsi index controller
   public function index()
   {
      $parsing['prodi'] = $this->m_prodi->getAllData();

      $this->load->view('admin/prodi/v_read', $parsing);
   }

   //! fungsi create data
   public function tambah()
   {
      // jika gagal
      if ($this->form_validation->run('prodi') == FALSE) {
         $parsing['fakultas'] = $this->m_fakultas->getAllData();
         $this->load->view('admin/prodi/v_create', $parsing);
      }
      // jika berhasil
      else {
         // proses data
         $data = array(
            'id_prd'   => rand(11111, 49999),
            'fklt_id'  => $this->input->post('fklt_id', TRUE),
            'nama_prd' => strtoupper($this->input->post('nama', TRUE)),
            'time_prd' => date('Y-m-d H:i:s')
         );
         $this->m_prodi->goInsertData($data);
         // flash message
         $this->session->set_flashdata('notif', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>selamat !</strong> data prodi telah berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         // redirect halaman
         redirect(site_url('admin/prodi'));
      }
   }

   //! fungsi edit data
   public function ubah($id)
   {
      // jika gagal
      if ($this->form_validation->run('prodi') == FALSE) {
         $parsing['fakultas'] = $this->m_fakultas->getAllData();
         $parsing['prd'] = $this->m_prodi->getIdData($id);
         $this->load->view('admin/prodi/v_edit', $parsing);
      }
      // jika berhasil
      else {
         // proses data
         $data = array(
            'nama_prd' => strtoupper($this->input->post('nama', TRUE))
         );
         $this->m_prodi->goUpdateData($id, $data);
         // flash message
         $this->session->set_flashdata('notif', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>selamat !</strong> data prodi telah berhasil diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         // redirect halaman
         redirect(site_url('admin/prodi'));
      }
   }

   //! fungsi edit data
   public function hapus($id)
   {
      // proses data
      $this->m_prodi->goDeleteData($id);
      // flash message
      $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>selamat !</strong> data prodi telah berhasil dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      // redirect halaman
      redirect(site_url('admin/prodi'));
   }
}

/* End of file Admin/Prodi.php */