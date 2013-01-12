<?php

define('CONFIG_FILE', __DIR__ . '/../config/config.php');
if (!file_exists(CONFIG_FILE)) {
    die('Configuration file needs to be built' . PHP_EOL);
}
require_once CONFIG_FILE;
require_once 'SplClassLoader.php';

$loader = new SplClassLoader('PhoxyCart', __DIR__);
$loader->register();


