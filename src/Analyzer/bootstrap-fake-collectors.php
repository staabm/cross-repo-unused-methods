<?php

$loader = new \Nette\Loaders\RobotLoader();
$loader->addDirectory(__DIR__ . '/FakeCollectors/');
$loader->setTempDirectory(__DIR__ . '/../../tmp/');
$loader->register(true);
