<?php

use Honeybee\FrameworkBinding\Silex\Bootstrap;
use Silex\Application;

$bootstrap = new Bootstrap;

return $bootstrap(new Application, [
    'version' => trim(file_get_contents(dirname(__DIR__).'/VERSION.txt')),
    'appEnv' => $appEnv,
    'appContext' => $appContext,
    'core' => [
        'config_dir' => dirname(__DIR__).'/vendor/honeylex/honeylex/app/config/default',
        'dir' => dirname(__DIR__).'/vendor/honeylex/honeylex'
    ],
    'project' => [
        'config_dir' => __DIR__.'/config',
        'dir' => dirname(__DIR__),
        'local_config_dir' => $localConfigDir
    ]
]);
