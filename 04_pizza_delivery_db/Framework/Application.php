<?php
namespace Framework;

class Application
{
    protected $router;

    public function __construct()
    {
        $this->initRouter();
    }

    public function run()
    {
        $controllerString = $this->router->parseRoute();
        if ($controllerString === false) {
            echo 'Route not found.';
            exit;
        }
        $this->executeController($controllerString);
    }

    protected function initRouter()
    {
        $this->router = new Router();
    }

    protected function executeController($controllerString)
    {
        $controllerArray = explode('#', $controllerString);
        $controller = $controllerArray[0];
        $method = $controllerArray[1];
        $objectController = new $controller();
        $objectController->$method();
    }
}
