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
$route['thank_you'] = 'site/place_order';
