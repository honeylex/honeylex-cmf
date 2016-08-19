<?php

$appEnv = 'dev';
$appContext = 'web';
$localConfigDir = getenv('LOCAL_CONFIG_DIR') ?: '/usr/local/honeylex.local';

require_once __DIR__.'/../vendor/autoload.php';

Symfony\Component\Debug\Debug::enable();

$app = require __DIR__.'/../app/bootstrap.php';
$app->run();
