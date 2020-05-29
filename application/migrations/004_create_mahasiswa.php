<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_mahasiswa extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'nim_mhs' => array(
            'type' => 'INT',
            'constraint' => 10,
            'unsigned' => TRUE
         ),
         'fklt_id' => array(
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => TRUE
         ),
         'prd_id' => array(
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => TRUE
         ),
         'nama_mhs' => array(
            'type' => 'VARCHAR',
            'constraint' => '100',
         ),
         'pass_mhs' => array(
            'type' => 'VARCHAR',
            'constraint' => '255',
         ),
      ));
      $this->dbforge->add_key('id_mhs', TRUE);
      $this->dbforge->create_table('mahasiswa');
   }

   public function down()
   {
      $this->dbforge->drop_table('mahasiswa');
   }
}

/* End of file create_mahasiswa.php */