<?php

declare(strict_types=1);

namespace ParaTest\Runners\PHPUnit;

use function array_merge;

final class FullSuite extends ExecutableTest
{
    /** @var string */
    private $suiteName;

    public function __construct(string $suiteName, bool $needsCoverage, string $tmpDir)
    {
        parent::__construct('', $needsCoverage, $tmpDir);

        $this->suiteName = $suiteName;
    }

    /**
     * @inheritDoc
     */
    protected function prepareOptions(array $options): array
    {
        return array_merge(
            $options,
            ['testsuite' => $this->suiteName]
        );
    }

    public function getTestCount(): int
    {
        return 1; //There is no simple way of knowing this
    }
}
