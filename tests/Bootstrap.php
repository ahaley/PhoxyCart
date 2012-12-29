<?php

define('ROOT_PATH', dirname(__DIR__ . '..'));
define('LIBRARY_PATH', realpath(ROOT_PATH . '/src'));
define('FIXTURES_PATH', __DIR__ . '/fixtures');

$include_path = explode(PATH_SEPARATOR, get_include_path());
$include_path[] = LIBRARY_PATH;
set_include_path(implode(PATH_SEPARATOR, $include_path));

require_once 'PhoxyCart.php';
