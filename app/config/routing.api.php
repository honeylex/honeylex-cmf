<?php

use Symfony\Component\HttpFoundation\JsonResponse;

$routing->get('/', function () {
    return new JsonResponse(['name' => 'Honeylex-CMF']);
})->bind('home');
