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
$route['default_controller'] = 'welcome';
$route['forgotpassword'] = 'admin/forgotpassword';
$route['resetpassword'] = 'admin/resetpassword';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'admin';
$route['register'] = "member/register";
$route['login'] = "member/login";
$route['edit-profile'] = "member/edit_profile";
$route['member-profile/(:any)'] = "member/profile/$1";
$route['messages'] = "member/messages";

//blogs
$route['blog'] = "blog";
$route['blog/(:any)'] = "blog/post/$1";
$route['blog/categories/(:any)'] = "blog/categories/$1";


//Media
$route['media'] = "media";
$route['media/categories/(:any)'] = 'media/media_category/$1';
$route['media/categories/(:num)/page/(:num)'] = 'media/media_category';
$route['media/(:num)'] = 'media/media_item';
$route['media/page/(:num)'] = 'media';

//Document
$route['documents'] = "document";
$route['documents/(:num)'] = "document";
$route['documents/download/(:any)'] = "document/download/$1";
$route['documents/categories/(:any)'] = "document/categories/$1";
$route['documents/categories/(:any)/(:num)'] = "document/categories/$1/$2";
$route['documents/(:any)'] = "document/document_item/$1";

//Event
$route['event'] = "event";
$route['event/(:any)'] = "event/item/$1";

//Discussions
$route['discussion'] = 'discussion';
$route['discussion/categories/(:any)'] = 'discussion/category/$1';
$route['discussion/categories/(:any)/(:num)'] = 'discussion/category/$1/$2';
$route['discussion/new_discussion/(:any)'] = 'discussion/new_discussion/$1';
$route['discussion/topic/(:any)'] = 'discussion/topic/$1';
$route['discussion/reply/(:any)/parent/(:num)'] = 'discussion/reply/$1/$2';
$route['discussion/search'] = 'discussion/search';
$route['discussion/search/(:num)'] = 'discussion/search';
$route['discussion/discussion_bookmarked'] = 'discussion/discussion_bookmarked';
$route['discussion/discussion_bookmarked/(:num)'] = 'discussion/discussion_bookmarked';

$route['(:any)'] = "aliases/check/$1";
