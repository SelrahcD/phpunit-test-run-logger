<?php

declare(strict_types=1);

namespace Selrahcd\PhpunitTestRunLogger;

final class TextFilePrinter
{
    private string $logFilePath;

    public function __construct(string $logFilePath)
    {
        $this->logFilePath = $logFilePath;
    }

    public function printTestRunLog(TestRunLog $testRunLog): void
    {
        $log = $testRunLog->isFailing() ? '❌ FAILING' : '✅ PASSING';

        $date = $testRunLog->testRunEndTime();

        file_put_contents($this->logFilePath, $log . ' - ' . $date->format('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);
    }
}