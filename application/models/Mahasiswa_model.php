<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
   //? inisiasi variabel untuk digunakan didalam class
   private $_table     = "mahasiswa";

   //! fungsi ambli seluruh data mahasiswa join dengan fakultas dan prodi\
   public function getAllData()
   {
      $this->db->select('*');
      $this->db->from($this->_table);
      $this->db->join('fakultas', 'fakultas.id_fklt = mahasiswa.fklt_id', 'join');
      $this->db->join('prodi', 'prodi.id_prd = mahasiswa.prd_id', 'join');
      $this->db->order_by('nim_mhs', 'asc');
      return $this->db->get()->result();
   }

   //!fungsi ambli satu data berdasarkan nim
   public function get_where_nim($nim)
   {
      return $this->db->get_where($this->_table, $nim)->row_array();
   }

   //! fungsi ambil 1 data berdasarkan nim untuk edit
   public function getIdData($id)
   {
      return $this->db->get_where($this->_table, ['nim_mhs' => $id])->row();
   }

   //! fungsi simpan data
   public function goInsertData($data = array())
   {
      return $this->db->insert($this->_table, $data);
   }

   //! fungsi ubah data berdasarkan id
   public function goUpdateData($id, $data = array())
   {
      $this->db->where('nim_mhs', $id);
      return $this->db->update($this->_table, $data);
   }

   //! fungsi hapus data berdasarkan id
   public function goDeleteData($id)
   {
      $this->db->where('nim_mhs', $id);
      return $this->db->delete($this->_table);
   }
}

/* End of file Mahasiswa_model.php */
