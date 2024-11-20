<?php

declare(strict_types=1);

namespace TomasVotruba\UnusedPublic\Collectors;

use PhpParser\Node;
use PhpParser\Node\Stmt\ClassMethod;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;
use PHPStan\Reflection\ClassReflection;
use staabm\CrossRepoUnusedPublic\Analyzer\AbstractDataLoadingCollector;
use TomasVotruba\UnusedPublic\ApiDocStmtAnalyzer;
use TomasVotruba\UnusedPublic\Configuration;
use TomasVotruba\UnusedPublic\MethodTypeDetector;
use TomasVotruba\UnusedPublic\PublicClassMethodMatcher;

/**
 * @implements AbstractDataLoadingCollector<ClassMethod, array{class-string, string, int}|null>
 */
final class PublicClassMethodCollector extends AbstractDataLoadingCollector
{}
