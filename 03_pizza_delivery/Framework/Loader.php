<?php
function loadClassFile($className)
{
    require_once APPLICATION_ROOT . str_replace('\\', '/', $className) . '.php';
}

spl_autoload_register('loadClassFile');
