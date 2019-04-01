<?php

echo "Rebuilding Examples\n";

$it = new DirectoryIterator(__DIR__);
foreach ($it as $file) {
    if ($file->isFile()) {
        continue;
    }
    $example = $file->getPathname() . '/example.php';
    if (file_exists($example)) {
        echo " - Building Example " . $file->getBasename() . "\n";
        ob_start();
        passthru(escapeshellcmd(PHP_BINARY) . ' ' . escapeshellarg($example));
        file_put_contents($file->getPathname() . '/example.output', ob_get_clean());
    }
}

echo "Done\n";