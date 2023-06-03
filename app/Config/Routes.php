<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index', ['as' => 'client.home']);
$routes->get('/about', 'Home::about', ['as' => 'client.about']);
$routes->get('/advisors', 'Home::advisors', ['as' => 'client.advisors']);
$routes->get('/faculties', 'Home::faculties', ['as' => 'client.facultys']);
$routes->get('/courses', 'Home::courses', ['as' => 'client.courses']);
$routes->add('/annual-days', 'Home::annualDays', ['as' => 'client.annual-days']);
$routes->add('/album-releases', 'Home::albumReleases', ['as' => 'client.album-releases']);
$routes->add('/recordings', 'Home::recordings', ['as' => 'client.recordings']);
$routes->add('/blogs', 'Home::blogs', ['as' => 'client.blogs']);
$routes->add('/blog/(:any)', 'Home::blog/$1');
$routes->add('/testimonials', 'Home::testimonials');
$routes->add('/contact-us', 'Home::contact');
$routes->add('/faculty-soma-dhattacharyya', 'Home::facultySoma');
$routes->add('/sharmistha-adak', 'Home::facultySharmistha');
$routes->add('/hhemant-khawalia', 'Home::facultyHhemantKhawalia');
$routes->add('/swarohi', 'Home::swarohi');

$routes->add('/login', 'Home::signIn', ['as' => 'client.login']);
$routes->add('/logout', 'Home::logout', ['as' => 'client.logout', 'filter' => 'userAuth']);

$routes->group("blog-api", function($routes){
    $routes->get('get-all-blogs', 'BlogApiController::index');
    $routes->add('create', 'BlogApiController::create');
    $routes->add('edit', 'BlogApiController::edit');
    $routes->add('delete', 'BlogApiController::delete');
    $routes->add('picture-upload', 'BlogApiController::PictureUpload');
    $routes->get('blog-categories', 'BlogApiController::Categories');
});

$routes->group("admin", function ($routes) {
    $routes->add('/', 'Admin::index', ['as' => 'admin.dashboard', 'filter' => 'auth']);
    $routes->add('/dashboard', 'Admin::index', ['as' => 'admin.dashboard', 'filter' => 'auth']);
    $routes->add('sign-in', 'Admin::signIn', ['as' => 'admin.sign-in']);
    $routes->add('sign-up', 'Admin::signUp', ['as' => 'admin.sign-up']);
    $routes->add('create-blog', 'Admin::createBlog', ['as' => 'admin.create-blog', 'filter' => 'auth']);
    $routes->add('blog-category', 'Admin::blogCategory', ['as' => 'admin.blog-category', 'filter' => 'auth']);
    $routes->add('blog-list', 'Admin::blogs', ['as' => 'admin.blog-list', 'filter' => 'auth']);
    $routes->add('edit-blog/(:any)', 'Admin::editBlog/$1', ['filter' => 'auth']);
    //    delete
    $routes->add('delete-blog-category/(:any)', 'Admin::deleteBlogCategory/$1', ['filter' => 'auth']);
    $routes->add('delete-blog/(:any)', 'Admin::deleteBlog/$1', ['filter' => 'auth']);
    $routes->add('testimonials', 'Admin::testimonials', ['as' => 'admin.testimonials','filter' => 'auth']);

    $routes->add('logout', 'Admin::logout', ['as' => 'admin.logout', 'filter' => 'auth']);
});
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
