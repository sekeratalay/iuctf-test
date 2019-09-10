<?php namespace Config;

/**
 * --------------------------------------------------------------------
 * URI Routing
 * --------------------------------------------------------------------
 * This file lets you re-map URI requests to specific controller functions.
 *
 * Typically there is a one-to-one relationship between a URL string
 * and its corresponding controller class/method. The segments in a
 * URL normally follow this pattern:
 *
 *    example.com/class/method/id
 *
 * In some instances, however, you may want to remap this relationship
 * so that a different class/function is called than the one
 * corresponding to the URL.
 */

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

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
 * The RouteCollection object allows you to modify the way that the
 * Router works, by acting as a holder for it's configuration settings.
 * The following methods can be called on the object to modify
 * the default operations.
 *
 *    $routes->defaultNamespace()
 *
 * Modifies the namespace that is added to a controller if it doesn't
 * already have one. By default this is the global namespace (\).
 *
 *    $routes->defaultController()
 *
 * Changes the name of the class used as a controller when the route
 * points to a folder instead of a class.
 *
 *    $routes->defaultMethod()
 *
 * Assigns the method inside the controller that is ran when the
 * Router is unable to determine the appropriate method to run.
 *
 *    $routes->setAutoRoute()
 *
 * Determines whether the Router will attempt to match URIs to
 * Controllers when no specific route has been defined. If false,
 * only routes that have been defined here will be available.
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/challenges', 'Home::challenges');

$routes->group('admin', function($routes)
{
	$routes->get('/', 'Admin::index');
	// $routes->get('sorular', 'Admin::challenges');
	$routes->post('categoryadd', 'Admin::categoryadd');

	$routes->group('categories', function($routes)
	{
		$routes->get('/', 'Admin/Categories::index');
		$routes->post('/', 'Admin/Categories::create');
	});

	$routes->group('challenges', function($routes)
	{
		$routes->get('/', 'Admin/Challenges::index');
		$routes->get('(:num)', 'App\Controllers\Admin\Challenges::show/$1');
		$routes->post('(:num)', 'App\Controllers\Admin\Challenges::update/$1');
		$routes->post('(:num)/addflag', 'App\Controllers\Admin\Challenges::addFlag/$1');
		$routes->post('/', 'Admin/Challenges::store');
	});

	$routes->group('teams', function($routes)
	{
		$routes->get('/', 				'App\Controllers\Admin\Teams::index');
		$routes->get('new', 			'App\Controllers\Admin\Teams::new');
		$routes->get('(:num)/edit', 		'App\Controllers\Admin\Teams::edit/$1');
		$routes->get('(:num)', 			'App\Controllers\Admin\Teams::show/$1');
		$routes->post('/', 				'App\Controllers\Admin\Teams::create');
		$routes->post('(:num)/delete',	'App\Controllers\Admin\Teams::delete/$1');
		$routes->post('(:num)', 			'App\Controllers\Admin\Teams::update/$1');
	});

	$routes->group('users', function($routes)
	{
		$routes->get('/', 				'App\Controllers\Admin\Users::index');
		$routes->get('new', 			'App\Controllers\Admin\Users::new');
		$routes->get('(:id)/edit', 		'App\Controllers\Admin\Users::edit/$1');
		$routes->get('(:id)', 			'App\Controllers\Admin\Users::show/$1');
		$routes->post('/', 				'App\Controllers\Admin\Users::create');
		$routes->post('(:id)/delete',	'App\Controllers\Admin\Users::delete/$1');
		$routes->post('(:id)', 			'App\Controllers\Admin\Users::update/$1');
	});

});
$routes->resource('users', ['websafe' => 1, 'placeholder' => '(:id)', 'controller' => 'App\Controllers\Admin\Users']);

$routes->group('api', function($routes)
{
	$routes->group('categories', function($routes)
	{
		$routes->get('/', 'Api/Categories::index');
	});
});

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
