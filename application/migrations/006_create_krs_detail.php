<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_krs_detail extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'id_dkrs' => array(
            'type' => 'INT',
            'constraint' => 10,
            'auto_increment' => TRUE,
            'unsigned' => TRUE
         ),
         'krs_detail_id' => array(
            'type' => 'INT',
            'constraint' => 10,
            'unsigned' => TRUE
         ),
         'mk_id' => array(
            'type' => 'INT',
            'constraint' => 10,
            'unsigned' => TRUE
         ),
         'sks_ambil' => array(
            'type' => 'INT',
            'constraint' => 3,
            'unsigned' => TRUE
         ),
         'sks_tempuh' => array(
            'type' => 'INT',
            'constraint' => 3,
            'unsigned' => TRUE
         ),
      ));
      $this->dbforge->add_key('id_dkrs', TRUE);
      $this->dbforge->create_table('krs_detail');
   }

   public function down()
   {
      $this->dbforge->drop_table('krs_detail');
   }
}

/* End of file create_krs_detail.php */