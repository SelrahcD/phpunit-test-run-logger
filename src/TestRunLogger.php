<?php

declare(strict_types=1);

namespace Selrahcd\PhpunitTestRunLogger;

use PHPUnit\Runner\AfterSuccessfulTestHook;

final class TestRunLogger implements AfterSuccessfulTestHook
{

    public function executeAfterSuccessfulTest(string $test, float $time): void
    {
        file_put_contents('test_run_logs', 'PASSING');
    }
}