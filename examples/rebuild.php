<?php

$it = new DirectoryIterator(__DIR__);
foreach ($it as $file) {
    if ($file->isFile()) {
        continue;
    }
    $example = $file->getPathname() . '/example.php';
    if (file_exists($example)) {
        ob_start();
        require $example;
        file_put_contents($file->getPathname() . '/example.output', ob_get_clean());
    }
}