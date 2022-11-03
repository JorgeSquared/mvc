<?php

/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);   // get the parent directory
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('/', ['controller' => 'Home', 'action' => 'index']);
$router->add('/posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('/{controller}/{action}');
$router->add('/admin/{action}/{controller}');
$router->add('/{controller}/{id:\d+}/{action}');

$url = $_SERVER['REQUEST_URI'];

//$router->dispatch($_SERVER['QUERY_STRING']);
$router->dispatch($_SERVER['REQUEST_URI']);
