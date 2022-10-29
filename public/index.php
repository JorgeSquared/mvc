<?php

/**
 * From now on, this file will serve as our front controller.
 * It is a place, where every URL is mapped to trigger a specific predefined action,
 * not like the other way round, where in the spaghetti-like projects, every single
 * URL maps to a specific *.php file, rendering the code unmaintainable
 */

/**
 * Routing
 */
require 'Core/Router.php';

$router = new Router();

// Add the routes
$router->add('/', ['controller' => 'Home', 'action' => 'index']);
$router->add('/posts', ['controller' => 'Posts', 'action' => 'index']);
//$router->add('/posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('/{controller}/{action}');
$router->add('/admin/{action}/{controller}');
$router->add('/{controller}/{id:\d+}/{action}');

$url = $_SERVER['REQUEST_URI'];

//var_dump($url);

// Display the routing table
echo '<pre>';
echo htmlspecialchars(print_r($router->getRoutes(), true));
echo '</pre>';

if ($router->match($url)) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
} else {
    echo "No route found for the URL '$url'";
}
