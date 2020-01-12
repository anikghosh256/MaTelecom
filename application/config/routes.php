<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'pages/home';
$route['(?i)home'] = 'pages/home';
$route['(?i)about'] = 'pages/about';
$route['(?i)contact'] = 'pages/contact';
$route['(?i)store'] = 'pages/store';
$route['(?i)product/(:any)'] = 'pages/product/$1';

$route['(?i)admin/(?i)login'] = 'user/login';
$route['(?i)admin/(?i)register'] = 'user/register';
$route['(?i)admin/(?i)logout'] = 'user/logout';
$route['(?i)admin'] = 'admin/home';
$route['404_override'] = 'pages/notfound';
$route['translate_uri_dashes'] = FALSE;
