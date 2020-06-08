<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_prodi extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'id_prd' => array(
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => TRUE
         ),
         'fklt_id' => array(
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => TRUE
         ),
         'nama_prd' => array(
            'type' => 'VARCHAR',
            'constraint' => '100',
         ),
         'time_prd' => array(
            'type' => 'DATETIME',
         ),
      ));
      $this->dbforge->add_key('id_prd', TRUE);
      $this->dbforge->create_table('prodi');
   }

   public function down()
   {
      $this->dbforge->drop_table('prodi');
   }
}

/* End of file create_prodi.php */