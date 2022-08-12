<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'master';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['change-password'] = 'profile/change_password';
$route['billing'] = 'profile/billing';
$route['myreferral'] = 'profile/myreferral';

$route['customers/payment/(:num)'] = 'lager/customer_payment/$1';
$route['paynow'] = 'account_security/paynow';
$route['payment-with-bkash'] = 'profile/payment_with_bkash';
$route['payment-with-rocket'] = 'profile/payment_with_rocket';
$route['payment-with-dbbl'] = 'profile/payment_with_dbbl';


$route['estimate-bandwidth'] = 'master/estimate_bandwidth_ap';
$route['packages'] = 'master/packages';
$route['referral'] = 'master/referral';
$route['referral-confirmation'] = 'master/referral_confirmation';
$route['package-order/(:num)'] = 'master/package_order/$1';
$route['package-confirmation'] = 'master/package_confirmation';
$route['coverage-area'] = 'master/coverage_area';




$route['login'] = 'account_security/login';
$route['register'] = 'account_security/register';
$route['new-register'] = 'account_security/new_register';
$route['account-verification'] = 'account_security/account_verification';
$route['self-care'] = 'account_security/self_care';
$route['check'] = 'account_security/check';
$route['logout'] = 'account_security/logout';

$controller = array(
    "adm_logo_management" => "logo-management",
    "adm_slider_management" => "slider-management",
    "adm_package_management" => "package-management",
    "adm_payment_management" => "payment-management",
    "adm_billing_management" => "billing-management",
    "adm_clients_management" => "clients-management"
);

foreach ($controller as $key => $value) {
  $route[$value] = $key;
  $route[$value . '/insert'] = $key . '/insert';
  $route[$value . '/view'] = $key . '/view';
  $route[$value . '/view/(:num)'] = $key . '/view/$1';
  $route[$value . '/edit/(:num)'] = $key . '/edit/$1';
  $route[$value . '/update'] = $key . '/update';
  $route[$value . '/delete/(:num)'] = $key . '/delete/$1';
}

$route['payment-management/pending-payment'] = 'adm_payment_management/pending_payment';
$route['payment-management/pending-payment/(:num)'] = 'adm_payment_management/pending_payment/$1';


define('EXT', '.php');
require_once( BASEPATH . 'database/DB' . EXT );
$db = & DB();


function RouteReplace($data) {
   $data = trim($data);
   $data = str_replace("'", "", $data);
   $data = str_replace("!", "", $data);
   $data = str_replace("@", "", $data);
   $data = str_replace("#", "", $data);
   $data = str_replace("$", "", $data);
   $data = str_replace("%", "", $data);
   $data = str_replace("^", "", $data);
   $data = str_replace("&", "", $data);
   $data = str_replace("*", "", $data);
   $data = str_replace("(", "", $data);
   $data = str_replace(")", "", $data);
   $data = str_replace("+", "", $data);
   $data = str_replace("=", "", $data);
   $data = str_replace(",", "", $data);
   $data = str_replace(":", "", $data);
   $data = str_replace(";", "", $data);
   $data = str_replace("|", "", $data);
   $data = str_replace("'", "", $data);
   $data = str_replace('"', "", $data);
   $data = str_replace("?", "", $data);
   $data = str_replace("'", "", $data);
   $data = str_replace(".", "-", $data);
   $data = str_replace("  ", "-", $data);
   $data = str_replace(" ", "-", $data);
   $data = str_replace("__", "-", $data);
   $data = str_replace("_", "-", $data);
   $data = strtolower(str_replace("--", "-", $data));
   return $data;
}