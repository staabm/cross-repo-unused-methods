<?php

namespace staabm\CrossRepoUnusedPublic\Recorder;

use PHPStan\Command\AnalysisResult;
use PHPStan\Command\ErrorFormatter\TableErrorFormatter;
use PHPStan\Command\Output;
use PHPStan\File\RelativePathHelper;
use Nette\Utils\Json;
use PHPStan\ShouldNotHappenException;

final class ErrorFormatter implements \PHPStan\Command\ErrorFormatter\ErrorFormatter {
    public function __construct(private RelativePathHelper $relativePathHelper, private TableErrorFormatter $tableErrorFormatter)
    {
    }

    public function formatErrors(AnalysisResult $analysisResult, Output $output): int
    {
        if ($analysisResult->hasInternalErrors()) {
            return $this->tableErrorFormatter->formatErrors($analysisResult, $output);
        }

        $json = [];
        foreach ($analysisResult->getFileSpecificErrors() as $error) {
            if ($error->getIdentifier() === 'ignore.unmatchedLine' || $error->getIdentifier() === 'ignore.unmatchedIdentifier') {
                continue;
            }

            if ($error->getIdentifier() !== 'crossRepoUnusedMethods.collectorData') {
                throw new ShouldNotHappenException();
            }

            $metadata = $error->getMetadata();
            if (!is_array($metadata) || count($metadata) !== 1) {
                throw new ShouldNotHappenException();
            }

            foreach($metadata as $collectorClass => $data) {
                if (!isset($json[$collectorClass])) {
                    $json[$collectorClass] = [];
                }
                $json[$collectorClass] = array_merge($json[$collectorClass], $data);
            }
        }

        $output->writeRaw(Json::encode([
            'data' => $json,
        ], true));

        return 0;
    }
}
