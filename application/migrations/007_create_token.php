<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_token extends CI_Migration
{
   public function up()
   {
      $this->dbforge->add_field(array(
         'id_tkn' => array(
            'type' => 'INT',
            'constraint' => 10,
            'unsigned' => TRUE
         ),
         'email_tkn' => array(
            'type' => 'VARCHAR',
            'constraint' => '128',
         ),
         'token' => array(
            'type' => 'VARCHAR',
            'constraint' => '255',
         ),
         'time_token' => array(
            'type' => 'INT',
            'constraint' => 11,
         ),
      ));
      $this->dbforge->add_key('id_tkn', TRUE);
      $this->dbforge->create_table('token');
   }

   public function down()
   {
      $this->dbforge->drop_table('token');
   }
}

/* End of file create_token.php */