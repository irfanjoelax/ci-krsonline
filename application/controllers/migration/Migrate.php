<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migrate extends CI_Controller
{

   /**
    * function construct untuk dijalankan pertama kali
    */
   public function __construct()
   {
      parent::__construct();

      // load library yang digunakan
      $this->load->library('migration');
   }

   /**
    * function untuk migration sesuai dengan version pada url browser
    */
   public function version($ver)
   {
      if ($this->migration->version($ver) === FALSE) {
         show_error($this->migration->error_string());
      } else {
         echo 'Migration Successfully For Sequential Version : ' . $ver;
      }
   }

   /**
    * function untuk membuat dummy data dengan seeder
    */
   public function seeder($table)
   {
      // data untuk user
      // $data = array();

      // $this->db->insert($table, $data);
      // echo 'Seeder Table ' . $table . ' is Successfully';
   }

   // function untuk mengkosong table 
   public function truncate($table)
   {
      $this->db->truncate($table);
      echo 'Truncate Table ' . $table . ' is Successfully';
   }
}

/* End of file Migrate.php */
