<?php
require_once __DIR__ . '/../core/Router.php'; // Corrected path
require_once __DIR__ . '/../app/controllers/LandingController.php';
require_once __DIR__ . '/../app/controllers/CinemaController.php';

// Initialize router
$router = new Router();

// Define routes
$router->add('/', 'LandingController@index'); // Landing page
$router->add('/cinema/register', 'CinemaController@register'); // Registration page
$router->add('/cinema/store', 'CinemaController@store'); // Form submission
$router->add('/cinema/success', 'CinemaController@success'); // Registration success page

$router->add('/cinema-details', 'CinemaController@getCinemaDetailsAPI'); 
// Dispatch the request
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($url);
