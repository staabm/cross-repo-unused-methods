<?php declare(strict_types = 1);

namespace staabm\CrossRepoUnusedPublic\Recorder;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Node\CollectedDataNode;
use PHPStan\Reflection\ReflectionProvider;
use PHPStan\Rules\RuleErrorBuilder;
use PHPStan\ShouldNotHappenException;
use TomasVotruba\UnusedPublic\Collectors\Callable_\AttributeCallableCollector;
use TomasVotruba\UnusedPublic\Collectors\Callable_\CallableTypeCollector;
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
    public const USAGE_COLLECTORS = [
        MethodCallCollector::class,
        MethodCallableCollector::class,
        StaticMethodCallCollector::class,
        StaticMethodCallableCollector::class,
        AttributeCallableCollector::class,
        CallableTypeCollector::class,
        ClassConstFetchCollector::class,
        // PublicClassLikeConstCollector::class,
        // PublicClassMethodCollector::class,
        // PublicPropertyCollector::class,
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
        foreach(self::USAGE_COLLECTORS as $collector) {
            $collectedData = [];
            foreach ($node->get($collector) as $data) {
                foreach($data as $rows) {
                    if (!is_array($rows)) {
                        throw new ShouldNotHappenException();
                    }

                    foreach($rows as $row) {
                        $collectedData[] = $row;
                    }
                }
            }

            $errors[] = RuleErrorBuilder::message('CollectorData')
                ->identifier('crossRepoUnusedMethods.collectorData')
                ->metadata([$collector => array_values(array_unique($collectedData))])->build();
        }

        return $errors;
    }

}
