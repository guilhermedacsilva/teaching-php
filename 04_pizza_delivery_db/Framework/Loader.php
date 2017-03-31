<?php
function loadClassfile($className)
{
    require_once APPLICATION_ROOT . str_replace('\\', '/', $className) . '.php';
}

spl_autoload_register('loadClassfile');
