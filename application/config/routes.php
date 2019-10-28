<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';
$route['csr_activity/(:any)'] = "csr_activity/detail/$1";
$route['category/(:any)/type/(:any)'] = "product/category/$1/$2";
$route['category_2/(:any)/type/(:any)'] = "product_2/category/$1/$2";
$route['disc/(:any)'] = "product/discount/$1";
$route['category/(:any)/type/(:any)/page/(:any)'] = "product/category/$1/$2/$3/$4";
$route['ajax_category/(:any)/type/(:any)/page/(:any)'] = "product/ajax_category/$1/$2/$3/$4";
$route['detailproduct/(:any)/(:any)'] = "product/detail/$1_$2";
$route['detailwedding/(:any)'] = "product/detailWedding/$1";
$route['blog'] = "blog/page";
$route['delivery_term'] = "about_us/delivery_term";
$route['diamond_guide'] = "about_us/diamond_guide";


$route['privacy-policy'] = "staticpage/page/information_privpolicy";
$route['terms-and-policy'] = "staticpage/page/information_termpolicy";
$route['exchange-policy'] = "staticpage/page/information_buyback";
$route['faq'] = "staticpage/page/information_faq";
$route['about-us'] = "staticpage/page/help_aboutus";
$route['contact-us'] = "staticpage/page/help_contact";
$route['shop'] = "staticpage/page/help_shop";
$route['waranty-and-maintanance'] = "staticpage/page/help_waranty";
$route['shopping-and-payment'] = "staticpage/page/guide_payment";
$route['delivery-terms'] = "staticpage/page/guide_term";
$route['material-guide'] = "staticpage/page/guide_material";
//$route['blog'] = "staticpage/page/guide_blog";

/* End of file routes.php */
/* Location: ./application/config/routes.php */