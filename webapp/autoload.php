<?php

spl_autoload_register(function ($className) {
    // File path of the class from its name (using the namespace)
    $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    $filePath = str_replace('webapp', 'src', $filePath);

    if (file_exists($filePath)) {
        require $filePath;
    }
});

