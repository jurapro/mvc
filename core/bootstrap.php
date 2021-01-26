<?php
declare(strict_types=1);

spl_autoload_register(function ($className) {
    $paths = include (__DIR__ . "/../config/path.php");
    $className = str_replace('\\', '/', $className);

    foreach ($paths['classes'] as $path) {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/$paths[root]/$path/$className.php")) {
            require_once ($_SERVER['DOCUMENT_ROOT'] . "/$paths[root]/$path/$className.php");
        }

    }
});


$settings['app'] = require_once(__DIR__ . "/../config/app.php");
$settings['path'] = require_once (__DIR__ . "/../config/path.php");
$settings['db'] =require_once(__DIR__ . "/../config/db.php");

require_once (__DIR__.'/../config/route.php');

return new Src\Application(Src\Settings::get($settings));
