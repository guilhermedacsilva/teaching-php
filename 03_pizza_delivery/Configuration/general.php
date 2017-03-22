<?php
/*
    The path always ends with '/'
*/

define('APPLICATION_ROOT', dirname(__DIR__) . '/');
define('APPLICATION_VIEW', APPLICATION_ROOT . 'View/');

$lengthDocRoot = strlen($_SERVER['DOCUMENT_ROOT']);
$urlRoot = substr(APPLICATION_ROOT, $lengthDocRoot);

define('URL_ROOT', $urlRoot);
define('URL_PUBLIC', URL_ROOT . 'Public/');
define('URL_CSS', URL_PUBLIC . 'css/');
define('URL_FONTS', URL_PUBLIC . 'fonts/');
define('URL_IMG', URL_PUBLIC . 'img/');
define('URL_JS', URL_PUBLIC . 'js/');
