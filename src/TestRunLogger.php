<?php

declare(strict_types=1);

namespace Selrahcd\PhpunitTestRunLogger;

use PHPUnit\Runner\AfterLastTestHook;
use PHPUnit\Runner\AfterSuccessfulTestHook;
use PHPUnit\Runner\AfterTestFailureHook;

final class TestRunLogger implements AfterSuccessfulTestHook, AfterTestFailureHook, AfterLastTestHook
{


    private bool $hasFailingTest = false;

    public function __construct()
    {
        $this->output = new TextFilePrinter();
    }

    public function executeAfterSuccessfulTest(string $test, float $time): void
    {
    }


    public function executeAfterTestFailure(string $test, string $message, float $time): void
    {
        $this->hasFailingTest = true;
    }

    public function executeAfterLastTest(): void
    {
        $log = $this->hasFailingTest ? '❌ FAILING' : '✅ PASSING';

        $date = new \DateTimeImmutable('now');

        $this->output->printTestRunLog($log, $date);
    }

}