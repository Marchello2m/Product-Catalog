<?php


use App\Controllers\Conteiner;
use App\Repositories\MysqlProductsRepository;
use App\Repositories\ProductsRepository;
use App\View;
use Twig\Environment;
use Twig\Extra\Markdown\MarkdownExtension;
use Twig\Loader\FilesystemLoader;

require 'vendor/autoload.php';


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {

    $r->addRoute('GET', '/', 'ProductsController@index');
    $r->addRoute('POST', '/', 'ProductController@index');

    $r->addRoute('GET', '/products', 'ProductsController@indexProducts');
    $r->addRoute('POST', '/products', 'ProductController@indexProducts');





 $r->addRoute('GET', '/create', 'ProductsController@create');
  $r->addRoute('POST', '/create', 'ProductsController@store');


    $r->addRoute('GET','/users','UsersController@index');

    $r->addRoute('GET','/register','UserRegController@showRegisterForm');
  $r->addRoute('POST','/register','UserRegController@register');



    $r->addRoute('GET','/login','UserRegController@showLoginForm');
    $r->addRoute('POST','/login','UserRegController@login');

    $r->addRoute('GET','/main','UserRegController@main');
    $r->addRoute('POST','/main','UserRegController@indexProducts');





    $r->addRoute('GET','/logout','UserRegController@showLogOutForm');
    $r->addRoute('POST','/logout','UserRegController@logout');

    $r->addRoute('GET', '/tag', 'TagController@index');
   // $r->addRoute('POST', '/tag', 'TagController@index');
   $r->addRoute('POST', '/tag', 'TagController@store');
});

function base_path():string
{
    return __DIR__;
}



// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);


$loader = new FilesystemLoader(base_path().'/app/Views');
$templateEngine = new Environment($loader, []);
$templateEngine->addExtension(new MarkdownExtension());



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

        $test = new Conteiner();
        $test->register(ProductsRepository::class ,new MysqlProductsRepository());

        [$controller,$method]=explode('@',$handler);
        $controller = 'App\Controllers\\'.$controller;
        $controller =new $controller;
        $response=  $controller->$method($vars);


        if($response instanceof View)
        {
            echo $templateEngine->render(
                $response->getTemplate(),
                $response->getArgs() );

        }

        break;
}