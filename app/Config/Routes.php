<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function ($message = null) {
    $data = [
        'title' => '404 - Page not found',
        'message' => $message,
    ];
    return view('errors/html/not_found_404', $data);
});
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/errors_403', 'General::error_403');
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/login/process', 'Auth::loginProcess');
$routes->get('/logout', 'Auth::logout');
$routes->get('/profile', 'General::profile');
$routes->post('/profile/changePassword', 'General::changePassword');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/master-data/asisten', 'Admin::listAsisten');
$routes->get('/master-data/smk', 'Admin::listSmk');
$routes->post('/master-data/smk/addSMK', 'Admin::addSMK');
$routes->get('/master-data/smk/deleteSMK/(:segment)', 'Admin::deleteSMK/$1');
$routes->get('/master-data/smk/showSMK/(:segment)', 'Admin::showSMK/$1');
$routes->post('/master-data/smk/updateSMK', 'Admin::updateSMK');
$routes->get('/master-data/prakerin', 'Admin::listPrakerin');
$routes->post('/master-data/prakerin/addPrakerin', 'Admin::addPrakerin');
$routes->get('/master-data/prakerin/deletePrakerin/(:segment)', 'Admin::deletePrakerin/$1');
$routes->get('/master-data/prakerin/showPrakerin/(:segment)', 'Admin::showPrakerin/$1');
$routes->post('/master-data/prakerin/updatePrakerin', 'Admin::updatePrakerin');
$routes->get('/input-data/kegiatan', 'General::kegiatan');
$routes->post('/input-data/kegiatan/addKegiatan', 'General::addKegiatan');
$routes->get('/input-data/kegiatan/deleteKegiatan/(:segment)', 'General::deleteKegiatan/$1');
$routes->post('/input-data/kegiatan/updateKegiatan', 'General::updateKegiatan');
$routes->get('/input-data/nilai', 'General::nilai');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}