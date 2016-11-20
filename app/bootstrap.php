<?php

use Silex\Application;

$projectConfigDir = __DIR__.'/config';
$application = new Application;
$configuration = [
    'version' => trim(file_get_contents(dirname(__DIR__).'/VERSION.txt')),
    'hostPrefix' => $hostPrefix,
    'appContext' => $appContext,
    'appEnv' => $appEnv,
    'core' => [
        'config_dir' => dirname(__DIR__).'/vendor/honeylex/honeylex/app/config/default',
        'dir' => dirname(__DIR__).'/vendor/honeylex/honeylex'
    ],
    'project' => [
        'config_dir' => $projectConfigDir,
        'dir' => dirname(__DIR__),
        'local_config_dir' => $localConfigDir
    ]
];

// execute context specific bootstrap
$contextConfigPath = $projectConfigDir."/bootstrap/$appContext.php";
if (is_readable($contextConfigPath)) {
    return require $contextConfigPath;
}

// default bootstrap attempt
$bootstrapClass = 'Honeybee\\FrameworkBinding\\Silex\\Bootstrap\\'.ucfirst($appContext).'Bootstrap';
$bootstrap = new $bootstrapClass;
$app = $bootstrap($application, $configuration);

return $app;
