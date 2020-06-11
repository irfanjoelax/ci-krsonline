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

   //? fungsi ambil data prodi berdasarkan id fakultas
   public function data_prodi($id)
   {
      $data = $this->m_prodi->getFakultasId($id);
      $this->output->set_output(json_encode($data));
   }

   //! fungsi import data
   public function import()
   {
      $this->load->view('admin/mahasiswa/v_import');
      // // jika gagal
      // if ($this->form_validation->run() == FALSE) {
      // }
      // // jika berhasil
      // else {
      //    // proses data
      //    $this->_upload_excel();
      //    // flash message
      //    $this->session->set_flashdata('notif', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>selamat !</strong> data mahasiswa telah berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      //    // redirect halaman
      //    redirect(site_url('admin/mahasiswa'));
      // }
   }

   //! fungsi private untuk upload file import excel
   public function upload_excel()
   {
      // Load plugin PHPExcel nya
      include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

      $config['upload_path'] = realpath('asset');
      $config['allowed_types'] = 'xlsx|xls';
      $config['max_size'] = '10000';

      // jika gagal
      if (!$this->upload->do_upload()) {
         // flash message
         $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>oops !</strong> ' . $this->upload->display_errors() . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         //redirect halaman
         redirect('admin/mahasiswa');
      }
      // jika berhasil
      else {
         $data_upload = $this->upload->data();

         $excelreader = new PHPExcel_Reader_Excel2007();
         $loadexcel   = $excelreader->load('asset/' . $data_upload['file_name']);
         $sheet       = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

         $data = array();

         $numrow = 1;
         foreach ($sheet as $row) {
            if ($numrow > 1) {
               array_push($data, array(
                  'nim_mhs'   => $row['A'],
                  'nama_mhs'  => $row['B'],
                  'prd_id'    => $row['C'],
                  'fklt_id'   => $row['D'],
                  'pass_mhs'  => password_hash('123456', PASSWORD_DEFAULT)
               ));
            }
            $numrow++;
         }

         // proses data
         $this->db->insert_batch('mahasiswa', $data);
         // hapus file dari server
         unlink(realpath('asset/' . $data_upload['file_name']));
         // flash message
         $this->session->set_flashdata('notif', '<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>selamat !</strong> data mahasiswa telah berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         // redirect halaman
         redirect(site_url('admin/mahasiswa'));
      }
   }
}

/* End of file Mahasiswa.php */
