<?php

$hostPrefix = getenv('HOST_PREFIX');
$appContext = 'api';
$appEnv = 'dev';
$localConfigDir = getenv('LOCAL_CONFIG_DIR') ?: '/usr/local/honeylex.local';

ini_set('html_errors', false);
ini_set('display_errors', true);

require_once __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__.'/../app/bootstrap.php';
$app->run();
