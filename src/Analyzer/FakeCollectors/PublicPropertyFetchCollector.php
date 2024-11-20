<?php

declare(strict_types=1);

namespace TomasVotruba\UnusedPublic\Collectors;

use PhpParser\Node;
use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;
use PHPStan\Reflection\ClassReflection;
use staabm\CrossRepoUnusedPublic\Analyzer\AbstractDataLoadingCollector;
use TomasVotruba\UnusedPublic\ClassTypeDetector;
use TomasVotruba\UnusedPublic\Configuration;

/**
 * @implements AbstractDataLoadingCollector<PropertyFetch, non-empty-array<string>|null>
 */
final class PublicPropertyFetchCollector extends AbstractDataLoadingCollector
{}
