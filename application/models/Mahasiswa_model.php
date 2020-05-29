<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
   //? inisiasi variabel untuk digunakan didalam class
   private $_table     = "mahasiswa";


   public function get_where_nim($nim)
   {
      return $this->db->get_where($this->_table, $nim)->row_array();
   }
}

/* End of file Mahasiswa_model.php */
