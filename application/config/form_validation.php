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
   )
);
