<?php

require_once __DIR__ . '/../config/config.php';
require_once 'SplClassLoader.php';

$loader = new SplClassLoader('PhoxyCart', __DIR__);
$loader->register();


