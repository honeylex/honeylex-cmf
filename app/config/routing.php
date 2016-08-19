<?php

// everything in here will be mounted at the top level of the apps urls namespace

$routing->get('/', function () use ($app) {
    return $app['twig']->render('@project/index.html.twig');
})->bind('home');
