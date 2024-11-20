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
    .' --configuration '. escapeshellarg(realpath(__DIR__.'/../cross-repo-unused-methods-recorder.neon'))
    //.' --debug'
    //.' --xdebug'
;
$output = \staabm\CrossRepoUnusedPublic\execCmd($cmd, $stderrOutput, $exitCode);

echo $output;
fwrite(STDERR, $stderrOutput);
exit($exitCode);
