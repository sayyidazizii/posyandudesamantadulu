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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



/*USER User/processEditUser*/
$route['user']                                        = 'User';
$route['change-password']                             = 'User/changePassword';
$route['change-password/(:num)']                      = 'User/changePassword/$1';
$route['user/add']                                    = 'User/Add';
$route['user/edit']                                   = 'User/Edit';
$route['user/edit/(:num)']                            = 'User/Edit/$1';
$route['user/delete/(:num)']                          = 'User/delete/$1';
$route['user/default-password/(:num)']                = 'User/defaultpassword/$1';
$route['user/process-add']                            = 'User/processAddUser';
$route['user/process-edit']                           = 'User/processEditUser';

// Balita
$route['balita']                                        = 'Balita';
$route['balita/add']                                    = 'Balita/Add';
$route['balita/edit']                                   = 'Balita/Edit';
$route['balita/edit/(:num)']                            = 'Balita/Edit/$1';
$route['balita/delete/(:num)']                          = 'Balita/delete/$1';
$route['balita/process-add']                            = 'Balita/processAddBalita';
$route['balita/process-edit']                           = 'Balita/processEditBalita';

// Kader
$route['kader']                                         = 'Kader';
$route['kader/add']                                     = 'Kader/Add';
$route['kader/edit']                                    = 'Kader/Edit';
$route['kader/edit/(:num)']                             = 'Kader/Edit/$1';
$route['kader/delete/(:num)']                           = 'Kader/delete/$1';
$route['kader/process-add']                             = 'Kader/processAddKader';
$route['kader/process-edit']                            = 'Kader/processEditKader';

// Kematian
$route['kematian']                                      = 'Kematian';
$route['kematian/add']                                  = 'Kematian/Add';
$route['kematian/edit']                                 = 'Kematian/Edit';
$route['kematian/edit/(:num)']                          = 'Kematian/Edit/$1';
$route['kematian/delete/(:num)']                        = 'Kematian/delete/$1';
$route['kematian/process-add']                          = 'Kematian/processAddkematian';
$route['kematian/process-edit']                         = 'Kematian/processEditkematian';

// Penimbangan
$route['penimbangan']                                   = 'Penimbangan';
$route['penimbangan/add']                               = 'Penimbangan/Add';
$route['penimbangan/edit']                              = 'Penimbangan/Edit';
$route['penimbangan/edit/(:num)']                       = 'Penimbangan/Edit/$1';
$route['penimbangan/delete/(:num)']                     = 'Penimbangan/delete/$1';
$route['penimbangan/process-add']                       = 'Penimbangan/processAddPenimbangan';
$route['penimbangan/process-edit']                      = 'Penimbangan/processEditPenimbangan';

// Imunisasi
$route['imunisasi']                                     = 'Imunisasi';
$route['imunisasi/add']                                 = 'Imunisasi/Add';
$route['imunisasi/edit']                                = 'Imunisasi/Edit';
$route['imunisasi/edit/(:num)']                         = 'Imunisasi/Edit/$1';
$route['imunisasi/delete/(:num)']                       = 'Imunisasi/delete/$1';
$route['imunisasi/process-add']                         = 'Imunisasi/processAddImunisasi';
$route['imunisasi/process-edit']                        = 'Imunisasi/processEditImunisasi';
