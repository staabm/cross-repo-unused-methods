<?php

declare(strict_types=1);

namespace TomasVotruba\UnusedPublic\Collectors\Callable_;

use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Expr\FuncCall;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Type\Constant\ConstantArrayType;
use staabm\CrossRepoUnusedPublic\Analyzer\AbstractDataLoadingCollector;
use TomasVotruba\UnusedPublic\ClassTypeDetector;
use TomasVotruba\UnusedPublic\Configuration;

/**
 * @extends AbstractDataLoadingCollector<FuncCall, non-empty-array<string>|null>
 */
final class CallableTypeCollector extends AbstractDataLoadingCollector
{}
