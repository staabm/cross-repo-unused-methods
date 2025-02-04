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
        return FileNode::class; // @phpstan-ignore return.type
    }

    public function processNode(Node $node, Scope $scope): ?array // @phpstan-ignore-line
    {
        static $once = [];

        $myClass = get_class($this);
        if (array_key_exists($myClass, $once)) {
            return [];
        }
        $once[$myClass] = true;

        $file = getcwd() . '/recording.json';
        $contents = file_get_contents($file);
        if ($contents === false) {
            throw new \RuntimeException("Missing recording file in $file");
        }

        $json = Json::decode($contents, true);

        return $json['data'][$myClass] ?? null; // @phpstan-ignore-line
    }

}
