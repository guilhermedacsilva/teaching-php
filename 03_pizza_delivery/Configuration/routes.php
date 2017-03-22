<?php
$routes = [
    '/' => [
        'GET' => '\Controller\MainController#index',
    ],
    '/client' => [
        'GET' => '\Controller\OrderController#create',
        'POST' => '\Controller\OrderController#store',
    ],
    '/pizza' => [
        'GET' => '\Controller\OrderController#index',
        'POST' => '\Controller\OrderController#destroy',
    ],
];
