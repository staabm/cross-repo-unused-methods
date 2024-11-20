#!/usr/bin/env php
<?php declare(strict_types=1);

require __DIR__ .'/../src/functions.php';

$cmd = __DIR__.'/../vendor/bin/phpstan analyze -c '. realpath(__DIR__.'/../cross-repo-unused-methods-analyzer.neon') .' '. realpath(__DIR__.'/empty.php') .' --debug --xdebug';
$output = \staabm\CrossRepoUnusedPublic\execCmd($cmd, $stderrOutput, $exitCode);

echo $output;
fwrite(STDERR, $stderrOutput);
exit($exitCode);
