<?php


require_once 'App/Router.php';

$router = new Router();

$router->get('/', 'HomeController@index');

return $router;