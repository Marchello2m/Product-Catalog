<?php
require 'vendor/autoload.php';


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {

    $r->addRoute('GET', '/', 'ProductsController@index');
    $r->addRoute('POST', '/', 'ProductController@index');

 $r->addRoute('GET', '/create', 'ProductAddController@create');
  $r->addRoute('POST', '/create', 'ProductAddController@store');


    $r->addRoute('GET','/users','UsersController@index');

    $r->addRoute('GET','/register','UserRegController@showRegisterForm');
  $r->addRoute('POST','/register','UserRegController@register');


    $r->addRoute('GET','/login','UserRegController@showLoginForm');
    $r->addRoute('POST','/login','UserRegController@login');



    $r->addRoute('GET','/logout','UserRegController@showLogOutForm');
    $r->addRoute('POST','/logout','UserRegController@logout');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];


        [$controller,$method]=explode('@',$handler);
        $controller = 'App\Controllers\\'.$controller;
        $controller =new $controller;
         $controller->$method();
        break;
}