<?php

$routing->get('/', function () use ($app) {
    return $app['twig']->render('@project/index.html.twig');
})->bind('home');
