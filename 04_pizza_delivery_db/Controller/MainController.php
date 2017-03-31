<?php
namespace Controller;

class MainController
{
    public function index()
    {
        header('Location: ' . URL_ROOT . 'client');
        exit;
    }
}
