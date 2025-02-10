<?php
session_start();

require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/AuthMiddleware.php';
require_once __DIR__ . '/../app/controllers/LandingController.php';
require_once __DIR__ . '/../app/controllers/CinemaController.php';
require_once __DIR__ . '/../app/controllers/UserController.php';

// Initialize router
$router = new Router();

// Define routes
$router->add('/', 'LandingController@index'); // Landing page
$router->add('/login', 'UserController@showLoginForm', 'GET'); // Show login form
$router->add('/login', 'UserController@login', 'POST'); // Handle login form submission
$router->add('/signup', 'UserController@showRegisterForm', 'GET'); // Show registration form
$router->add('/signup', 'UserController@register', 'POST'); // Handle registration form submission
$router->add('/verify', 'UserController@showVerify', 'GET');
$router->add('/verify', 'UserController@verifyCode', 'POST');
$router->add('/logout', 'UserController@logout', 'GET'); // Logout route

// Restricted routes for managers
$router->add('/cinema/register', function () {
    AuthMiddleware::handle('manager'); // Only managers can access
    (new CinemaController())->register();
}, 'GET');

$router->add('/cinema/store', function () {
    AuthMiddleware::handle('manager'); // Only managers can access
    (new CinemaController())->store();
}, 'POST');

$router->add('/cinema/success', function () {
    AuthMiddleware::handle('manager'); // Only managers can access
    (new CinemaController())->success();
}, 'GET');


// Restricted routes for superadmins
$router->add('/superadmin/home', function () {
    AuthMiddleware::handle('superadmin'); // Only superadmins can access
    (new UserController())->superadminHome();
}, 'GET');
$router->add('/superadmin/admins', function () {
    AuthMiddleware::handle('superadmin'); // Only superadmins can access
    (new UserController())->superadminAdmin();
}, 'GET');
$router->add('/superadmin/cinemas', function () {
    AuthMiddleware::handle('superadmin'); // Only superadmins can access
    (new UserController())->superadminCinemas();
}, 'GET');
$router->add('/superadmin/appusers', function () {
    AuthMiddleware::handle('superadmin'); // Only superadmins can access
    (new UserController())->superadminAppusers();
}, 'GET');
$router->add('/superadmin/cashiers', function () {
    AuthMiddleware::handle('superadmin'); // Only superadmins can access
    (new UserController())->superadminCashiers();
}, 'GET');
$router->add('/superadmin/movies', function () {
    AuthMiddleware::handle('superadmin'); // Only superadmins can access
    (new UserController())->superadminMovies();
}, 'GET');
$router->add('/superadmin/tickets', function () {
    AuthMiddleware::handle('superadmin'); // Only superadmins can access
    (new UserController())->superadminTickets();
}, 'GET');

// Dispatch the request
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($url, $_SERVER['REQUEST_METHOD']);
