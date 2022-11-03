<?php

// Require the controller class
require 'App/Controllers/Posts.php';

/**
 * Routing
 */
require 'Core/Router.php';

$router = new Router();

// Add the routes
$router->add('/', ['controller' => 'Home', 'action' => 'index']);
$router->add('/posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('/{controller}/{action}');
$router->add('/admin/{action}/{controller}');
$router->add('/{controller}/{id:\d+}/{action}');

$url = $_SERVER['REQUEST_URI'];

/*// Display the routing table
echo '<pre>';
echo htmlspecialchars(print_r($router->getRoutes(), true));
echo '</pre>';

if ($router->match($url)) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
} else {
    echo "No route found for the URL '$url'";
}*/
$router->dispatch($_SERVER['REQUEST_URI']);
