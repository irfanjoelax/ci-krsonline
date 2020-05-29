<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_krs extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'id_krs' => array(
            'type' => 'INT',
            'constraint' => 10,
            'auto_increment' => TRUE,
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
         'mhs_nim' => array(
            'type' => 'INT',
            'constraint' => 10,
            'unsigned' => TRUE
         ),
         'dosen_krs' => array(
            'type' => 'VARCHAR',
            'constraint' => '120',
         ),
         'ta_krs' => array(
            'type' => 'VARCHAR',
            'constraint' => '50',
         ),
         'prgrm_krs' => array(
            'type' => 'VARCHAR',
            'constraint' => '50',
         ),
      ));
      $this->dbforge->add_key('id_krs', TRUE);
      $this->dbforge->create_table('krs');
   }

   public function down()
   {
      $this->dbforge->drop_table('krs');
   }
}

/* End of file create_krs.php */