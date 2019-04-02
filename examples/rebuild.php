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

$benchmarks = [];
$compileTimes = [];
$it = new DirectoryIterator(__DIR__);
foreach ($it as $file) {
    if ($file->isFile()) {
        continue;
    }
    $example = $file->getPathname() . '/example.output';
    if (file_exists($example)) {
        $exampleName = $file->getBasename();
        $exampleOutput = file_get_contents($example);
        $benchmarks[$exampleName] = extractBenchmark($exampleOutput);
        $compileTimes[$exampleName] = extractCompileTime($exampleOutput);
    }
}

ksort($benchmarks);
ksort($compileTimes);

$benchmarkTable = buildTable($benchmarks);
$compileTimeTable = buildTable($compileTimes);

$readme = file_get_contents(__DIR__ . '/README.md');

$readme = preg_replace('((<!-- benchmark table start -->)(.*)(<!-- benchmark table end -->))ims', "\$1\n\n" . $benchmarkTable . "\n\$3", $readme);

$readme = preg_replace('((<!-- compile time table start -->)(.*)(<!-- compile time table end -->))ims', "\$1\n\n" . $compileTimeTable . "\n\$3", $readme);

file_put_contents(__DIR__ . '/README.md', $readme);

echo $table;

echo "Done\n";


function extractBenchmark(string $output): array {
    $regex = '(^Benchmark Results:\s*(\\n\\s+[a-zA-Z0-9 ]+:\s*[0-9.]+\s+seconds\s*?)+)im';
    preg_match($regex, $output, $match);
    $regex2 = '(^\s+([a-zA-Z0-9 ]+):\s*([0-9.]+)\s+seconds)im';
    preg_match_all($regex2, $match[0], $matches, PREG_SET_ORDER);
    $result = [];
    foreach ($matches as $match) {
        $result[$match[1]] = $match[2];
    }
    return $result;
}

function extractCompileTime(string $output): array {
    $regex = '(^Time to Compile:\s*(\\n\\s+[a-zA-Z0-9 ]+:\s*[0-9.]+\s+seconds\s*?)+)im';
    preg_match($regex, $output, $match);
    $regex2 = '(^\s+([a-zA-Z0-9 ]+):\s*([0-9.]+)\s+seconds)im';
    preg_match_all($regex2, $match[0], $matches, PREG_SET_ORDER);
    $result = [];
    foreach ($matches as $match) {
        $result[$match[1]] = $match[2];
    }
    return $result;
}

function buildTable(array $times): string {
    $allbackends = [];
    foreach ($times as $results) {
        $allbackends = array_merge($allbackends, array_keys($results));
    }
    $allbackends = array_unique($allbackends);
    sort($allbackends);

    $table = '| Example Name                  |';
    foreach ($allbackends as $name) {
        $table .= sprintf('%12s |', $name);
    }

    $table .= "\n|-------------------------------|";
    
    foreach ($allbackends as $name) {
        $table .= str_repeat('-', 13) . '|';
    }
    $table .= "\n";
    
    foreach ($times as $name => $results) {
        $table .= sprintf('|%30s |', $name);
        foreach ($allbackends as $backend) {
            $table .= sprintf('%12s |', isset($results[$backend]) ? $results[$backend] : '');
        }
        $table .= "\n";
    }
    return $table;
}
