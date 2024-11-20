<?php

declare(strict_types=1);

namespace TomasVotruba\UnusedPublic\Collectors;

use PhpParser\Node;
use PhpParser\Node\Stmt\ClassConst;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;
use PHPStan\Reflection\ClassReflection;
use staabm\CrossRepoUnusedPublic\Analyzer\AbstractDataLoadingCollector;
use TomasVotruba\UnusedPublic\ApiDocStmtAnalyzer;
use TomasVotruba\UnusedPublic\Configuration;

/**
 * @implements AbstractDataLoadingCollector<ClassConst, non-empty-array<array{class-string, string, int}>|null>
 */
final class PublicClassLikeConstCollector extends AbstractDataLoadingCollector
{}
