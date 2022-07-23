<?php

declare(strict_types=1);

namespace Selrahcd\PhpunitTestRunLogger;

use PHPUnit\Runner\AfterLastTestHook;
use PHPUnit\Runner\AfterSuccessfulTestHook;
use PHPUnit\Runner\AfterTestFailureHook;

final class TestRunLogger implements AfterSuccessfulTestHook, AfterTestFailureHook, AfterLastTestHook
{

    private bool $hasFailingTest = false;

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

        file_put_contents('test_run_logs', $log . PHP_EOL, FILE_APPEND);
    }
}