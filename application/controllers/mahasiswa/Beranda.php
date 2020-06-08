<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
   //! function construct
   public function __construct()
   {
      parent::__construct();

      $this->load->library('form_validation');

      if ($this->session->userdata('level') != 2) {
         return redirect(site_url('/'));
      }
   }

   //! fungsi index controller
   public function index()
   {
      $this->load->view('mahasiswa/v_beranda');
   }
}

/* End of file Mahasiswa/Beranda.php */
