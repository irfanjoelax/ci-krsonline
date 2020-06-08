<?php
$config = array(
   'fakultas' => array(
      array(
         'field' => 'nama',
         'label' => 'Nama Fakultas',
         'rules' => 'required|trim',
         'errors' => array(
            'required' => '%s harus terisi.',
         ),
      )
   ),
   'prodi' => array(
      array(
         'field' => 'nama',
         'label' => 'Nama Prodi',
         'rules' => 'required|trim',
         'errors' => array(
            'required' => '%s harus terisi.',
         ),
      ),
      array(
         'field' => 'fklt_id',
         'label' => 'Fakultas',
         'rules' => 'required|trim',
         'errors' => array(
            'required' => '%s harus terisi.',
         ),
      )
   )
);
