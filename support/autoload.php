<?php

spl_autoload_register(function ($class) {
    $prefixes = [
        'App\\' => dirname(__DIR__) . '/app/',
        'Support\\' => dirname(__DIR__) . '/support/',
    ];

    foreach ($prefixes as $prefix => $base_dir) {
        if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
            continue;
        }

        $relative_class = substr($class, strlen($prefix));
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

        if (file_exists($file)) {
            require_once $file;
            return;
        } else {
            throw new Exception("Couldn't load class: $class\nCheck path: $file");
        }
    }
});
require_once __DIR__ . '/env.php';