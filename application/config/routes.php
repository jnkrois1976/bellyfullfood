<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['home'] = 'site/index';
$route['menu'] = 'site/menu';
$route['faq'] = 'site/faq';
$route['order'] = 'site/order';
$route['cart'] = 'site/cart';
$route['contact'] = 'site/contact';
$route['thank_you'] = 'site/thank_you';
$route['place_order'] = 'site/place_order';
$route['email_test'] = 'site/email_test';
$route['send_message'] = 'site/send_message';
$route['admin'] = 'admin/index';
