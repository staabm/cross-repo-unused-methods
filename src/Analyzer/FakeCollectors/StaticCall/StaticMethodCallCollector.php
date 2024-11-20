<?php

declare(strict_types=1);

namespace TomasVotruba\UnusedPublic\Collectors\StaticCall;

use PhpParser\Node;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;
use PHPStan\Reflection\ClassReflection;
use staabm\CrossRepoUnusedPublic\Analyzer\AbstractDataLoadingCollector;
use TomasVotruba\UnusedPublic\ClassTypeDetector;
use TomasVotruba\UnusedPublic\Configuration;

/**
 * @extends AbstractDataLoadingCollector<StaticCall, non-empty-array<string>|null>
 */
final class StaticMethodCallCollector extends AbstractDataLoadingCollector
{}
