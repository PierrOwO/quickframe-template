#!/usr/bin/env php
<?php

require __DIR__ . '/support/autoload.php';

$argv = $_SERVER['argv'];
$command = $argv[1] ?? null;

switch ($command) {
    case 'make:controller':
        $name = $argv[2] ?? null;
        if (!$name) {
            echo "Type name of the controller.\n";
            exit(1);
        }
        if (!str_ends_with($name, 'Controller')) {
            $className = $name . 'Controller';
        } else {
            $className = $name;
        }

        $stub = file_get_contents(__DIR__ . '/support/create/controller.stub');
        $stub = str_replace('ClassName', $className . 'Controller', $stub);
    
        $outputPath = __DIR__ . "/app/Controllers/{$className}Controller.php";
        if (file_exists($outputPath)) {
            echo "Controller already exists.\n";
            exit(1);
        }
    
        file_put_contents($outputPath, $stub);
        echo "Created controller: {$className}Controller\n";
        break;
    case 'make:model':
        $name = $argv[2] ?? null;
        if (!$name) {
            echo "Type name of the model.\n";
            exit(1);
        }
        $table_name = strtolower($name);
        $stub = file_get_contents(__DIR__ . '/support/create/model.stub');
        $stub = str_replace('ClassName', $name, $stub);
        $stub = str_replace('table_name', $table_name, $stub);
    
        $outputPath = __DIR__ . "/app/Models/{$name}.php";
        if (file_exists($outputPath)) {
            echo "Model already exists.\n";
            exit(1);
        }
    
        file_put_contents($outputPath, $stub);
        echo "Created model: {$name}\n";
        break;
    case 'make:middleware':
        $name = $argv[2] ?? null;
        if (!$name) {
            echo "Type name of the middleware.\n";
            exit(1);
        }
        
        $stub = file_get_contents(__DIR__ . '/support/create/middleware.stub');
        $stub = str_replace('ClassName', $name, $stub);
    
        $outputPath = __DIR__ . "/app/Middleware/{$name}.php";
        if (file_exists($outputPath)) {
            echo "Middleware already exists.\n";
            exit(1);
        }
    
        file_put_contents($outputPath, $stub);
        echo "Created middleware: {$name}\n";
        break;
    case 'make:helper':
        $name = $argv[2] ?? null;
        if (!$name) {
            echo "Type name of the helper.\n";
            exit(1);
        }
        
        $stub = file_get_contents(__DIR__ . '/support/create/helper.stub');
        $stub = str_replace('ClassName', $name, $stub);
    
        $outputPath = __DIR__ . "/app/Helpers/{$name}.php";
        if (file_exists($outputPath)) {
            echo "Helper already exists.\n";
            exit(1);
        }
    
        file_put_contents($outputPath, $stub);
        echo "Created helper: {$name}\n";
        break;
    case 'make:view':
        $name = $argv[2] ?? null;
        if (!$name) {
            echo "Type name of the view.\n";
            exit(1);
        }

        $stub = file_get_contents(__DIR__ . '/support/create/view.stub');
        $stub = str_replace('ClassName', $name, $stub);

        $relativePath = "/resources/views/{$name}.frame.php";
        $outputPath = __DIR__ . $relativePath;

        $dir = dirname($outputPath);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        if (file_exists($outputPath)) {
            echo "View already exists: $relativePath\n";
            exit(1);
        }

        file_put_contents($outputPath, $stub);
        echo "Created view: $relativePath\n";
        break;
    default:
        echo "unknown command\n";
        break;
}

//cd C:/Projects/MyProject
//linux: chmod +x creator.php
// php creator.php make:[..]

//php creator.php make:model Product
//php creator.php make:controller Order
//php creator.php make:middleware AuthCheck
//php creator.php make:helper formatPrice
//php creator.php make:view home
