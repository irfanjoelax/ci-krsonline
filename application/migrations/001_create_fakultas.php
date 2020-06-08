<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_fakultas extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'id_fklt' => array(
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => TRUE
         ),
         'nama_fklt' => array(
            'type' => 'VARCHAR',
            'constraint' => '100',
         ),
         'time_fklt' => array(
            'type' => 'DATETIME',
         ),
      ));
      $this->dbforge->add_key('id_fklt', TRUE);
      $this->dbforge->create_table('fakultas');
   }

   public function down()
   {
      $this->dbforge->drop_table('fakultas');
   }
}

/* End of file create_fakultas.php */