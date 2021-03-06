<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'Service\Models' => APP_PATH . '/common/models/',
    'Service'        => APP_PATH . '/common/library/',
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'Service\Modules\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'Service\Modules\Api\Module' => APP_PATH . '/modules/api/Module.php',
    'Service\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
