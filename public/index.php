<?php

/**
 * Composer autoloading
 */
require_once dirname(__DIR__) .  '/vendor/autoload.php';

/**
 * Error and Exception handling
 */
// The error handler needs to be temporarily commented out
// due to deprecation messages coming from twig 1.0 and its incompatibility with
// PHP 8.1
//set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('/', ['controller' => 'Home', 'action' => 'index']);
$router->add('/posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('/{controller}/{action}');
$router->add('/{controller}/{id:\d+}/{action}');
$router->add('/admin/{controller}/{action}', ['namespace' => 'Admin']);

//$router->dispatch($_SERVER['QUERY_STRING']);
$router->dispatch($_SERVER['REQUEST_URI']);
