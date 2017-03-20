<?php
define('APP_ROOT', __DIR__ . '/');

function loadClassFile($className)
{
    require_once APP_ROOT . str_replace('\\', '/', $className) . '.php';
}

spl_autoload_register('loadClassFile');

\Model\Message::createDatafile(); // it creates our database file
