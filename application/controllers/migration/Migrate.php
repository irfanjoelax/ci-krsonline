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
      $data = array(
         array(
            'nim_mhs'   => 1,
            'fklt_id'   => 0,
            'prd_id'    => 0,
            'nama_mhs'  => 'Administrator',
            'pass_mhs'  => password_hash('admin020412', PASSWORD_DEFAULT),
         ),
         array(
            'nim_mhs'   => 150105011,
            'fklt_id'   => 1,
            'prd_id'    => 1,
            'nama_mhs'  => 'Muhammad Irfan Permana',
            'pass_mhs'  => password_hash('irfan020412', PASSWORD_DEFAULT),
         )
      );

      $this->db->insert_batch($table, $data);
      echo 'Seeder Table ' . $table . ' is Successfully';
   }

   // function untuk mengkosong table 
   public function truncate($table)
   {
      $this->db->truncate($table);
      echo 'Truncate Table ' . $table . ' is Successfully';
   }
}

/* End of file Migrate.php */
