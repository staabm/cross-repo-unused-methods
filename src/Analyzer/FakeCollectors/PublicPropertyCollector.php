<?php

declare(strict_types=1);

namespace TomasVotruba\UnusedPublic\Collectors;

use Livewire\Component;
use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;
use PHPStan\Node\InClassNode;
use PHPStan\Reflection\ClassReflection;
use staabm\CrossRepoUnusedPublic\Analyzer\AbstractDataLoadingCollector;
use TomasVotruba\UnusedPublic\ApiDocStmtAnalyzer;
use TomasVotruba\UnusedPublic\Configuration;

/**
 * @implements AbstractDataLoadingCollector<InClassNode, non-empty-array<array{class-string, string, int}>>
 */
final class PublicPropertyCollector extends AbstractDataLoadingCollector
{}
