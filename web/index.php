<?php

$appContext = 'web';

$appVersion = getEnv('APP_VERSION') ?: 'master';
$appEnv = getenv('APP_ENV') ?: 'dev';
$appDebug = getenv('APP_DEBUG') ?: true;
$hostPrefix = getenv('HOST_PREFIX');
$localConfigDir = getenv('LOCAL_CONFIG_DIR') ?: '/usr/local/env';

require_once __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../app/bootstrap.php';
$app->run();
