<?php declare(strict_types = 1);

namespace staabm\CrossRepoUnusedPublic\Recorder;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Node\CollectedDataNode;
use PHPStan\Reflection\ReflectionProvider;
use PHPStan\Rules\RuleErrorBuilder;
use PHPStan\ShouldNotHappenException;
use TomasVotruba\UnusedPublic\Collectors\Callable_\AttributeCallableCollector;
use TomasVotruba\UnusedPublic\Collectors\Callable_\CallUserFuncCollector;
use TomasVotruba\UnusedPublic\Collectors\ClassConstFetchCollector;
use TomasVotruba\UnusedPublic\Collectors\FormTypeClassCollector;
use TomasVotruba\UnusedPublic\Collectors\MethodCall\MethodCallableCollector;
use TomasVotruba\UnusedPublic\Collectors\MethodCall\MethodCallCollector;
use TomasVotruba\UnusedPublic\Collectors\PublicClassLikeConstCollector;
use TomasVotruba\UnusedPublic\Collectors\PublicClassMethodCollector;
use TomasVotruba\UnusedPublic\Collectors\PublicPropertyCollector;
use TomasVotruba\UnusedPublic\Collectors\PublicPropertyFetchCollector;
use TomasVotruba\UnusedPublic\Collectors\PublicStaticPropertyFetchCollector;
use TomasVotruba\UnusedPublic\Collectors\StaticCall\StaticMethodCallableCollector;
use TomasVotruba\UnusedPublic\Collectors\StaticCall\StaticMethodCallCollector;
use function array_pop;
use function array_unique;
use function array_values;
use function in_array;

/**
 * @implements \PHPStan\Rules\Rule<CollectedDataNode>
 */
class CollectedDataRule implements \PHPStan\Rules\Rule
{
    public const COLLECTORS = [
        MethodCallCollector::class,
        MethodCallableCollector::class,
        StaticMethodCallCollector::class,
        StaticMethodCallableCollector::class,
        AttributeCallableCollector::class,
        CallUserFuncCollector::class,
        ClassConstFetchCollector::class,
        PublicClassLikeConstCollector::class,
        PublicClassMethodCollector::class,
        PublicPropertyCollector::class,
        PublicPropertyFetchCollector::class,
        PublicStaticPropertyFetchCollector::class,
        FormTypeClassCollector::class,
    ];

    public function getNodeType(): string
    {
        return CollectedDataNode::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        $errors = [];
        foreach(self::COLLECTORS as $collector) {
            foreach ($node->get($collector) as $data) {
                foreach($data as $rows) {
                    $errors[] = RuleErrorBuilder::message('CollectorData')
                        ->identifier('crossRepoUnusedMethods.collectorData')
                        ->metadata([$collector => $rows])->build();
                }
            }
        }

        return $errors;
    }

}
