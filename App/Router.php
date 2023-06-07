<?php

class Router {
    protected $routes = [];

    public function get($uri, $action) {
        $this->addRoute('GET', $uri, $action);
    }

    public function post($uri, $action) {
        $this->addRoute('POST', $uri, $action);
    }

    public function put($uri, $action) {
        $this->addRoute('PUT', $uri, $action);
    }

    public function delete($uri, $action) {
        $this->addRoute('DELETE', $uri, $action);
    }

    protected function addRoute($method, $uri, $action) {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'action' => $action
        ];
    }

    public function dispatch($method, $uri) {
        foreach ($this->routes as $route) {
            if ($route['method'] == $method && $route['uri'] == $uri) {
                if (is_callable($route['action'])) {
                    // Si la acción es un cierre o una función, llámala directamente
                    return call_user_func($route['action']);
                } elseif (is_string($route['action'])) {
                    // Si la acción es una cadena, intenta resolverla como un controlador y un método
                    $parts = explode('@', $route['action']);
                    $controller = $parts[0];
                    $method = $parts[1];
                    if (class_exists($controller)) {
                        $controllerInstance = new $controller();
                        if (method_exists($controllerInstance, $method)) {
                            // Llama al método del controlador
                            return $controllerInstance->$method();
                        }
                    }
                }
            }
        }
        // Si no se encontró ninguna ruta, muestra un error o una página no encontrada
        return include "views/error/404.php";
    }
}
