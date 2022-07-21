<?php

declare(strict_types=1);

namespace Selrahcd\PhpunitTestRunLogger;

use PHPUnit\Runner\AfterSuccessfulTestHook;
use PHPUnit\Runner\AfterTestErrorHook;
use PHPUnit\Runner\AfterTestFailureHook;

final class TestRunLogger implements AfterSuccessfulTestHook, AfterTestFailureHook
{

    public function executeAfterSuccessfulTest(string $test, float $time): void
    {
        file_put_contents('test_run_logs', 'PASSING');
    }


    public function executeAfterTestFailure(string $test, string $message, float $time): void
    {
        file_put_contents('test_run_logs', 'FAILING');
    }
}