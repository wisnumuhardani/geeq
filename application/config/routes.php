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

$route['default_controller'] = 'page';
$route['index'] = 'page';
$route['404_override'] = 'page/error';
$route['register'] = 'user/register';
$route['login'] = 'user/login';
$route['forgot-password'] = 'page/user/forgotpassword';
$route['contact'] = 'page/contact';
$route['thank-you'] = 'page/thankyou';
$route['category/(:any)'] = 'page/category/$1';
$route['category/(:any)/(:any)'] = 'page/category/$1/$2';
$route['viewquiz/(:any)/(:any)'] = "page/viewquiz/$1/$2";
$route['listquiz'] = 'page/listquiz';
$route['profile/(:any)/(:any)'] = 'page/profile/$1/$2';
$route['profile/(:any)'] = 'page/profile/$1';

$route['my-stories/(:any)'] = 'member/mystories/$1';
$route['write-story/(:any)'] = 'member/writestory/$1';
$route['setting/(:any)'] = 'member/setting/$1';

$route['detail/(:any)/(:any)'] = "page/detail/$1/$2";
$route['read/(:any)/(:any)'] = "page/read/$1/$2";
$route['pages/(:any)'] = "page/pages/$1";
$route['trending'] = 'page/trending';
$route['tags'] = 'page/tags';
$route['quiz'] = 'page/quiz';
$route['quizdisplay'] = 'page/quizdisplay';
$route['page/seachresult/(:any)-(:any)'] = "page/seachresult/$1/$2";
$route['tag?(:any)'] = "page/tag/$1";

$route['translate_uri_dashes'] = FALSE;
