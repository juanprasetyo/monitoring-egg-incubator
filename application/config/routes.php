<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'C_Index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login']                             = 'C_Auth/login_view';
$route['logout']                            = 'C_Auth/logout';
$route['register']                          = 'C_Auth/register_view';
$route['forgot_password']                   = 'C_Auth/forgot_password';
$route['recovery_password']                 = 'C_Auth/recovery_password';

$route['admin']                             = 'C_Index';
$route['admin/(:any)']                      = 'C_Index/$1';
$route['dashboard']                         = 'C_User';
$route['dashboard/(:any)']                  = 'C_User/$1';
$route['about']                             = 'C_Index/about';

$route['insert_suhu_kelembaban']            = 'C_NodeMCU/insert_suhu_kelembaban';
$route['updata_status_lampu']               = 'C_NodeMCU/update_status_lampu';
$route['update_status_kipas']               = 'C_NodeMCU/update_status_kipas';
$route['get_config_device']                 = 'C_NodeMCU/get_config_device';
$route['get_config_dht']                    = 'C_NodeMCU/get_config_dht';