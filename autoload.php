<?php 
function autoloadControllers($className) {
    $className = str_replace('\\', '/', $className);
    $filePath = __DIR__ . '/controllers/' . $className . '.php';

    if (file_exists($filePath)) {
        require_once $filePath;
    }
}

spl_autoload_register('autoloadControllers');
