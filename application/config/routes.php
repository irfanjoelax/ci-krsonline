<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// custom route
$route['migrate/(:num)'] = 'migration/migrate/version/$1';
$route['seeder/(:any)'] = 'migration/migrate/seeder/$1';
