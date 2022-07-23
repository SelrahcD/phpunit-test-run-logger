<?php

declare(strict_types=1);

namespace Selrahcd\PhpunitTestRunLogger;

use PHPUnit\Runner\AfterLastTestHook;
use PHPUnit\Runner\AfterTestFailureHook;

final class TestRunLogger implements AfterTestFailureHook, AfterLastTestHook
{
    private TestRunLog $testRunLog;
    private TextFilePrinter $output;

    public function __construct(TextFilePrinter $printer)
    {
        $this->output = $printer;
        $this->testRunLog = new TestRunLog();
    }

    public function executeAfterTestFailure(string $test, string $message, float $time): void
    {
        $this->testRunLog->logFailingTest();
    }

    public function executeAfterLastTest(): void
    {
        $date = new \DateTimeImmutable('now');

        $this->testRunLog->testEndedOn($date);

        $this->output->printTestRunLog($this->testRunLog);
    }

}