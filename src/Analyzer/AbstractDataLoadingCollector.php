<?php declare(strict_types = 1);

namespace staabm\CrossRepoUnusedPublic\Analyzer;

use Nette\Utils\Json;
use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;
use PHPStan\Node\ExecutionEndNode;
use PHPStan\Node\FileNode;

/**
 * @phpstan-template-covariant TNodeType of Node
 * @phpstan-template-covariant TValue
 *
 * @phpstan-implements Collector<TNodeType, TValue>
 */
abstract class AbstractDataLoadingCollector implements Collector
{
    public function getNodeType() : string
    {
        return FileNode::class;
    }

    public function processNode(Node $node, Scope $scope): ?array
    {
        static $once = [];

        $myClass = get_class($this);
        if (array_key_exists($myClass, $once)) {
            return [];
        }
        $once[$myClass] = true;

        $file = dirname(__DIR__, 2) . '/recording.txt';

        $contents = file_get_contents($file);
        if ($contents === false) {
            throw new \LogicException();
        }

        $json = Json::decode($contents, true);

        return $json['data'][$myClass] ?? null;
    }

}
