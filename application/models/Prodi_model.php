<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Prodi_model extends CI_Model
{
   //? inisiasi variabel untuk digunakan didalam class
   private $_table     = "prodi";

   //! fungsi ambil seluruh data join table fakultas
   public function getAllData()
   {
      $this->db->select('*');
      $this->db->from($this->_table);
      $this->db->join('fakultas', 'fakultas.id_fklt = prodi.fklt_id', 'inner');
      $this->db->order_by('time_prd', 'desc');
      return $this->db->get()->result();
   }

   //! fungsi ambil 1 data berdasarkan Id
   public function getIdData($id)
   {
      return $this->db->get_where($this->_table, ['id_prd' => $id])->row();
   }

   //! fungsi ambil 1 data berdasarkan Id fakultas
   public function getFakultasId($id)
   {
      return $this->db->get_where($this->_table, ['fklt_id' => $id])->result();
   }

   //! fungsi simpan data
   public function goInsertData($data = array())
   {
      return $this->db->insert($this->_table, $data);
   }

   //! fungsi ubah data berdasarkan id
   public function goUpdateData($id, $data = array())
   {
      $this->db->where('id_prd', $id);
      return $this->db->update($this->_table, $data);
   }

   //! fungsi hapus data berdasarkan id
   public function goDeleteData($id)
   {
      $this->db->where('id_prd', $id);
      return $this->db->delete($this->_table);
   }
}

/* End of file Prodi_model.php */