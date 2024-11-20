<?php

$cmd = __DIR__.'/../vendor/bin/phpstan analyze -c '. realpath(__DIR__.'/../cross-repo-unused-methods-analyzer.neon') .' '. realpath(__DIR__.'/empty.php') .' --debug --xdebug';
system($cmd);
