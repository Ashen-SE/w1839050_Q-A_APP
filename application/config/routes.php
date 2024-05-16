<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['questions/create'] = 'questions/create';
$route['questions/update'] = 'questions/update';
$route['questions/(:any)'] = 'questions/view/$1';
$route['questions'] = 'questions/index';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
