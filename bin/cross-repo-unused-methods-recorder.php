<?php

if (!isset($argv[1])) {
    echo 'Please provide the path to the project you want to analyze';
    exit(1);
}

$cmd = realpath(__DIR__.'/../vendor/bin/phpstan'). ' analyze -c '. realpath(__DIR__.'/../cross-repo-unused-methods-recorder.neon') .' '. escapeshellarg($argv[1]) . ' --debug --xdebug';
echo $cmd;
system($cmd);
