<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas_model extends CI_Model
{
   //? inisiasi variabel untuk digunakan didalam class
   private $_table     = "fakultas";

   //! fungsi ambil seluruh data
   public function getAllData()
   {
      $this->db->order_by('time_fklt', 'desc');
      return $this->db->get($this->_table)->result();
   }

   //! fungsi ambil 1 data berdasarkan Id
   public function getIdData($id)
   {
      return $this->db->get_where($this->_table, ['id_fklt' => $id])->row();
   }

   //! fungsi simpan data
   public function goInsertData($data = array())
   {
      return $this->db->insert($this->_table, $data);
   }

   //! fungsi ubah data berdasarkan id
   public function goUpdateData($id, $data = array())
   {
      $this->db->where('id_fklt', $id);
      return $this->db->update($this->_table, $data);
   }

   //! fungsi hapus data berdasarkan id
   public function goDeleteData($id)
   {
      $this->db->where('id_fklt', $id);
      return $this->db->delete($this->_table);
   }
}

/* End of file Fakultas_model.php */