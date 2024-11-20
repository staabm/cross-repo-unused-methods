<?php

declare(strict_types=1);

namespace TomasVotruba\UnusedPublic\Collectors\MethodCall;

use PhpParser\Node;
use PhpParser\Node\Expr;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;
use PHPStan\Node\MethodCallableNode;
use PHPStan\Reflection\ClassReflection;
use staabm\CrossRepoUnusedPublic\Analyzer\AbstractDataLoadingCollector;
use TomasVotruba\UnusedPublic\CallReferece\CallReferencesFlatter;
use TomasVotruba\UnusedPublic\ClassMethodCallReferenceResolver;
use TomasVotruba\UnusedPublic\ClassTypeDetector;
use TomasVotruba\UnusedPublic\Configuration;

/**
 * @extends AbstractDataLoadingCollector<MethodCallableNode, non-empty-array<string>|null>
 */
final class MethodCallableCollector extends AbstractDataLoadingCollector {

}
