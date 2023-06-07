<?php

require_once 'config/config.php';
require_once 'autoload.php';

require_once 'router/web.php';

$router = include 'router/web.php';
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
