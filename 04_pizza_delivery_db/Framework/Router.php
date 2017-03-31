<?php
namespace Framework;

class Router
{
    /* always starts with '/'
        never ends with '/' */
    protected $relativeRoot;
    protected $routes;

    public function __construct()
    {
        require APPLICATION_ROOT . 'Configuration/routes.php';
        $this->routes = $routes;
        $this->relativeRoot = substr(URL_ROOT, 0, -1);
    }

    public function parseRoute()
    {
        $requestPath = $_SERVER['REQUEST_URI'];
        $routePath = $this->removeRelativeRoot($requestPath);
        return $this->recoverRoute($routePath);
    }

    protected function removeRelativeRoot($requestPath)
    {
        return substr($requestPath, strlen($this->relativeRoot));
    }

    protected function recoverRoute($routePath)
    {
        if (array_key_exists($routePath, $this->routes)) {
            $route = $this->routes[$routePath];
            if (array_key_exists($_SERVER['REQUEST_METHOD'], $route)) {
                return $route[$_SERVER['REQUEST_METHOD']];
            }
        }
        return false;
    }
}
