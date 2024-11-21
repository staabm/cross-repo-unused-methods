#!/usr/bin/env php
<?php declare(strict_types=1);

use Nette\Utils\Json;

// Finding composer

$paths = [
    __DIR__.'/../vendor/autoload.php',
    __DIR__.'/../../../autoload.php',
];

foreach ($paths as $path) {
    if (file_exists($path)) {
        include $path;
        break;
    }
}

error_reporting(E_ALL);
ini_set('display_errors', 'stderr');

if (!isset($argv[1]) || !isset($argv[2])) {
    fwrite(STDERR, 'Please provide at least 2 path to be merged');
    exit(1);
}

$files = [];
for ($i = 1; $i < count($argv); $i++) {
    $files[] = $argv[$i];
}

$mergedJson = [];
foreach($files as $file) {
    if (!file_exists($file)) {
        fwrite(STDERR, sprintf('File %s does not exist', $file));
        exit(1);
    }

    $contents = file_get_contents($file);
    if ($contents === false) {
        throw new \LogicException();
    }

    $json = Json::decode($contents, true);
    $mergedJson = appendArray($mergedJson, $json);
}

echo Json::encode($mergedJson, true);

function appendArray(array $arr1, array $arr2): array {
    foreach($arr2 as $key => $value) {
        if (array_key_exists($key, $arr1)) {
            if (is_array($value)) {
                $arr1[$key] = appendArray($arr1[$key], $value);
            } elseif (is_array($arr1[$key])) {
                $arr1[$key][] = $value;
            } elseif (is_array($arr1)) {
                $arr1[] = $value;
            } else {
                throw new LogicException();
            }
        } else {
            $arr1[$key] = $value;
        }
    }

    return $arr1;
}
