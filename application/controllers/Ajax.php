<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{
   //? fungsi ambil data prodi berdasarkan id fakultas
   public function data_prodi($id_fakultas)
   {
      $data = $this->m_prodi->getFakultasId($id_fakultas);
      $this->output->set_output(json_encode($data));
   }
}
