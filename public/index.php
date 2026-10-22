<?php
define('ROOT_PATH', dirname(__DIR__));

require ROOT_PATH . '/config/config.php';

spl_autoload_register(function (string $class): void {
    foreach (['core', 'controllers', 'models'] as $dir) {
        $file = ROOT_PATH . "/app/$dir/$class.php";
        if (is_file($file)) {
            require $file;
            return;
        }
    }
});

session_start();

(new Router())->dispatch($_GET['url'] ?? '');
