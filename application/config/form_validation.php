<?php
$config = array(
   'login' => array(
      array(
         'field' => 'nim',
         'label' => 'NIM',
         'rules' => 'required|trim|numeric',
         'errors' => array(
            'required' => '%s harus terisi.',
            'numeric' => 'Masukkan %s dengan benar.'
         ),
      ),
      array(
         'field' => 'password',
         'label' => 'Password',
         'rules' => 'required|trim',
         'errors' => array(
            'required' => '%s harus terisi.',
         ),
      )
   ),
   'register' => array(
      array(
         'field' => 'nim',
         'label' => 'NIM',
         'rules' => 'required|trim|is_unique[mahasiswa.nim_mhs]',
         'errors' => array(
            'required' => '%s harus terisi.',
            'is_unique' => '%s sudah pernah terdaftar.',
         ),
      ),
      array(
         'field' => 'nama',
         'label' => 'Nama Mahasiswa',
         'rules' => 'required|trim',
         'errors' => array(
            'required' => '%s harus terisi.',
         ),
      ),
      array(
         'field' => 'email',
         'label' => 'Email Mahasiswa',
         'rules' => 'required|trim|valid_email|is_unique[mahasiswa.email_mhs]',
         'errors' => array(
            'required' => '%s harus terisi.',
            'valid_email' => 'Harap masukkan %s dengan benar.',
            'is_unique' => '%s sudah pernah terdaftar.',
         ),
      ),
      array(
         'field' => 'fklt_id',
         'label' => 'Fakultas',
         'rules' => 'required|trim',
         'errors' => array(
            'required' => '%s harus terisi.',
         ),
      ),
      array(
         'field' => 'prd_id',
         'label' => 'Program Studi',
         'rules' => 'required|trim',
         'errors' => array(
            'required' => '%s harus terisi.',
         ),
      ),
      array(
         'field' => 'pass1',
         'label' => 'Password',
         'rules' => 'required|trim|matches[pass2]',
         'errors' => array(
            'required' => '%s harus terisi.',
            'matches' => '%s dengan ulang password harus sama.',
         ),
      ),
      array(
         'field' => 'pass2',
         'label' => 'Ulang Password',
         'rules' => 'required|trim|matches[pass1]',
         'errors' => array(
            'required' => '%s harus terisi.',
            'matches' => '%s dengan password harus sama.',
         ),
      ),
   ),
   'lupa_password' => array(
      array(
         'field' => 'email',
         'label' => 'Email',
         'rules' => 'required|trim|valid_email',
         'errors' => array(
            'required' => '%s harus terisi.',
            'valid_email' => 'Harap masukkan %s dengan benar.',
         ),
      )
   ),
   'ubah_password' => array(
      array(
         'field' => 'pass1',
         'label' => 'Password Baru',
         'rules' => 'required|trim|matches[pass2]',
         'errors' => array(
            'required' => '%s harus terisi.',
            'matches' => '%s dengan ulang password harus sama.',
         ),
      ),
      array(
         'field' => 'pass2',
         'label' => 'Ulang Password',
         'rules' => 'required|trim|matches[pass1]',
         'errors' => array(
            'required' => '%s harus terisi.',
            'matches' => '%s dengan password baru harus sama.',
         ),
      ),
   ),
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
   ),
   'mahasiswa' => array(
      array(
         'field' => 'nim',
         'label' => 'NIM',
         'rules' => 'required|trim',
         'errors' => array(
            'required' => '%s harus terisi.',
         ),
      ),
      array(
         'field' => 'nama',
         'label' => 'Nama Mahasiswa',
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
      ),
      array(
         'field' => 'prd_id',
         'label' => 'Program Studi',
         'rules' => 'required|trim',
         'errors' => array(
            'required' => '%s harus terisi.',
         ),
      )
   )
);
