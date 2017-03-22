<?php
namespace Framework;

use \Model\Order;

class Application
{
    protected $router;

    public function __construct()
    {
        $this->initDatabase();
        $this->initRouter();
    }

    public function run()
    {
        $stringController = $this->router->parseRoute();
        if ($stringController === false) {
            echo 'Route not found.';
            exit;
        }
        $this->executeController($stringController);
    }

    protected function initDatabase()
    {
        Order::createFile();
    }

    protected function initRouter()
    {
        $this->router = new Router();
    }

    protected function executeController($stringController)
    {
        $controllerArray = explode('#', $stringController);
        $controller = $controllerArray[0];
        $method = $controllerArray[1];
        $controllerInstance = new $controller();
        $controllerInstance->$method();
    }
}
