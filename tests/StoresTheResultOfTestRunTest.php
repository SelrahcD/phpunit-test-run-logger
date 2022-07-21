<?php

declare(strict_types=1);

namespace Selrahcd\PhpunitTestRunLogger;

use PHPUnit\Framework\TestCase;

class StoresTheResultOfTestRunTest extends TestCase
{

    const PHPUNIT_BIN = __DIR__ . '/../vendor/bin/phpunit';

    /**
    * @test
    */
    public function when_passing_in_a_plain_text_file(): void {
        $fixture = 'SinglePassingTest';

        $this->runATestFile($fixture);

        $expectedLogs = <<<LOGS
PASSING
LOGS;
        $this->assertLogFileIs($expectedLogs);
    }

    /**
     * @test
     */
    public function when_failing_in_a_plain_text_file(): void {
        $fixture = 'SingleFailingTest';

        $this->runATestFile($fixture);

        $expectedLogs = <<<LOGS
FAILING
LOGS;
;
        $this->assertLogFileIs($expectedLogs);
    }

    /**
     * @test
     */
    public function when_one_test_is_failing_in_a_plain_text_file(): void {
        $fixture = 'MultipleTests';

        $this->runATestFile($fixture);

        $expectedLogs = <<<LOGS
FAILING
LOGS;
;
        $this->assertLogFileIs($expectedLogs);
    }


    /**
     * @param string $fixture
     * @return void
     */
    private function runATestFile(string $fixture, string $testFile = 'SomeTest'): void
    {
        exec(
            'cd ' . __DIR__ . ' && ' . self::PHPUNIT_BIN . ' -c phpunit-with-test-run-logger.xml fixtures/' . $fixture . '/' . $testFile . '.php'
        );
    }

    /**
     * @param string $expectedLogs
     * @return void
     */
    private function assertLogFileIs(string $expectedLogs): void
    {
        $testRunLogsFile = __DIR__ . '/test_run_logs';
        $testRunLogs = file_get_contents($testRunLogsFile);;
        $this->assertEquals($expectedLogs, $testRunLogs);
    }
}
