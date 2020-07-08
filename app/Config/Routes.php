<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', function(){
	echo "Home<br><a href='/hadiah'>Menuju Kehalaman Barang</a>";
});
$routes->get('/hadiah', "Hadiah::index");
$routes->post('/tambah_hadiah','Hadiah::tambah_hadiah');
$routes->post('/hapus_hadiah','Hadiah::hapus_hadiah');
$routes->post('/tampil_data','Hadiah::tampil_data');
$routes->post('/edit_hadiah','Hadiah::edit_hadiah');
$routes->get('/data_user','User::index');
$routes->post('/tambah_user','User::tambah_user');
$routes->post('/hapus_user','User::hapus_user');
$routes->post('/tampil_user','User::tampil_user');
$routes->post('/edit_user','User::edit_user');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
