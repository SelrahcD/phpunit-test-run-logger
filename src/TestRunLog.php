<?php

declare(strict_types=1);

namespace Selrahcd\PhpunitTestRunLogger;

final class TestRunLog
{
    private bool $hasAFailingTest = false;

    private \DateTimeImmutable $testRunEndTime;

    public function logFailingTest(): void
    {
        $this->hasAFailingTest = true;
    }

    public function isFailing(): bool
    {
        return $this->hasAFailingTest;
    }

    public function testEndedOn(\DateTimeImmutable $testRunEndTime): void
    {
        $this->testRunEndTime = $testRunEndTime;
    }

    public function testRunEndTime(): \DateTimeImmutable
    {
        return $this->testRunEndTime;
    }
}