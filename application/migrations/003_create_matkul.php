<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_matkul extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'id_mk' => array(
            'type' => 'VARCHAR',
            'constraint' => 10,
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
         'nama_mk' => array(
            'type' => 'VARCHAR',
            'constraint' => '100',
         ),
         'sks_mk' => array(
            'type' => 'INT',
            'constraint' => 2,
            'unsigned' => TRUE
         ),
         'dosen_mk' => array(
            'type' => 'VARCHAR',
            'constraint' => '120',
         ),
         'jam_mk' => array(
            'type' => 'VARCHAR',
            'constraint' => '50',
         ),
         'ruang_mk' => array(
            'type' => 'INT',
            'constraint' => 2,
            'unsigned' => TRUE
         ),
      ));
      $this->dbforge->add_key('id_mk', TRUE);
      $this->dbforge->create_table('matkul');
   }

   public function down()
   {
      $this->dbforge->drop_table('matkul');
   }
}

/* End of file create_matkul.php */