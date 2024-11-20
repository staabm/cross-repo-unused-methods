<?php

declare(strict_types=1);

namespace TomasVotruba\UnusedPublic\Collectors;

use PhpParser\Node;
use PhpParser\Node\Expr\ArrayItem;
use PhpParser\Node\Scalar\String_;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;
use PHPStan\Type\Constant\ConstantStringType;
use staabm\CrossRepoUnusedPublic\Analyzer\AbstractDataLoadingCollector;
use TomasVotruba\UnusedPublic\Configuration;

/**
 * Match Symfony data_class element in forms types, as those use magic setters/getters
 * @extends AbstractDataLoadingCollector<ArrayItem, non-empty-array<string>|null>
 */
final class FormTypeClassCollector extends AbstractDataLoadingCollector
{}
