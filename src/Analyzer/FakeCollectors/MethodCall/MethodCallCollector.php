<?php

declare(strict_types=1);

namespace TomasVotruba\UnusedPublic\Collectors\MethodCall;

use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\MethodCall;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;
use PHPStan\Reflection\ClassReflection;
use staabm\CrossRepoUnusedPublic\Analyzer\AbstractDataLoadingCollector;
use TomasVotruba\UnusedPublic\CallReferece\CallReferencesFlatter;
use TomasVotruba\UnusedPublic\CallReferece\ParentCallReferenceResolver;
use TomasVotruba\UnusedPublic\ClassMethodCallReferenceResolver;
use TomasVotruba\UnusedPublic\ClassTypeDetector;
use TomasVotruba\UnusedPublic\Configuration;

/**
 * @extends AbstractDataLoadingCollector<MethodCall, non-empty-array<string>|null>
 */
final class MethodCallCollector extends AbstractDataLoadingCollector
{}
