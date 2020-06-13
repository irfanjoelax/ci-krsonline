<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/

$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// custom route
$route['migrate/(:num)'] = 'migration/migrate/version/$1';
$route['seeder/(:any)'] = 'migration/migrate/seeder/$1';
$route['auth/ubah-password'] = 'auth/ubah_password';
$route['auth/lupa-password'] = 'auth/lupa_password';
