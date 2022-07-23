<?php

declare(strict_types=1);

namespace Selrahcd\PhpunitTestRunLogger;

final class TextFilePrinter
{

    public function __construct()
    {
    }

    /**
     * @param string $log
     * @param \DateTimeImmutable $date
     * @return void
     */
    public function printTestRunLog(string $log, \DateTimeImmutable $date): void
    {
        file_put_contents('test_run_logs', $log . ' - ' . $date->format('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);
    }
}