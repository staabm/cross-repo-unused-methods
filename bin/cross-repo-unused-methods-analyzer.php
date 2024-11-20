#!/usr/bin/env php
<?php declare(strict_types=1);

if (!isset($argv[1])) {
    fwrite(STDERR, 'Please provide the path to the project you want to analyze');
    exit(1);
}

require_once __DIR__.'/../vendor/autoload.php';

$cmd =
    realpath(__DIR__.'/../vendor/bin/phpstan')
    .' analyze '. escapeshellarg($argv[1])
    .' --configuration '. escapeshellarg(realpath(__DIR__.'/../cross-repo-unused-methods-analyzer.neon'))
    .' --autoload-file '. escapeshellarg(realpath(__DIR__ . '/../src/Analyzer/bootstrap-fake-collectors.php'))
    //.' --debug'
    //.' --xdebug'
;
$output = \staabm\CrossRepoUnusedPublic\execCmd($cmd, $stderrOutput, $exitCode);

echo $output;
fwrite(STDERR, $stderrOutput);
exit($exitCode);
