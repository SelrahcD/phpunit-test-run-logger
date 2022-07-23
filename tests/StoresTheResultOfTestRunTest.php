<?php

declare(strict_types=1);

namespace Selrahcd\PhpunitTestRunLogger;

use PHPUnit\Framework\TestCase;

class StoresTheResultOfTestRunTest extends TestCase
{
    const PHPUNIT_BIN = __DIR__ . '/../vendor/bin/phpunit';

    const LOG_FILE = '/tmp/test-log-file';

    protected function tearDown(): void
    {
        unlink(self::LOG_FILE);
    }


    /**
    * @test
    */
    public function when_passing_in_a_plain_text_file(): void {
        $this->runATestFile('SinglePassingTest');

        $expectedLogs = <<<LOGS
✅ PASSING - \d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}

LOGS;
        $this->assertLogFileIs($expectedLogs);
    }

    /**
     * @test
     */
    public function when_failing_in_a_plain_text_file(): void {
        $this->runATestFile('SingleFailingTest');

        $expectedLogs = <<<LOGS
❌ FAILING - \d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}
LOGS;
;
        $this->assertLogFileIs($expectedLogs);
    }

    /**
     * @test
     */
    public function when_one_test_is_failing_in_a_plain_text_file(): void {
        $this->runATestFile('MultipleTestsWithFailingTest');

        $expectedLogs = <<<LOGS
❌ FAILING - \d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}
LOGS;
;
        $this->assertLogFileIs($expectedLogs);
    }
    
    /**
    * @test
    */
    public function with_multiple_test_runs(): void {
        $this->runATestFile('SinglePassingTest');
        $this->runATestFile('SinglePassingTest');
        $this->runATestFile('SingleFailingTest');
        $this->runATestFile('SinglePassingTest');

        $expectedLogs = <<<LOGS
✅ PASSING - \d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}
✅ PASSING - \d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}
❌ FAILING - \d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}
✅ PASSING - \d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}

LOGS;
        ;
        $this->assertLogFileIs($expectedLogs);
    }

    private function runATestFile(string $testFile): void
    {
        exec(self::PHPUNIT_BIN . ' -c ' . __DIR__ . '/phpunit-with-test-run-logger.xml ' . __DIR__ . '/Fixtures/'. $testFile . '.php');
    }

    private function assertLogFileIs(string $expectedLogs): void
    {
        $testRunLogs = file_get_contents(self::LOG_FILE);

        assert(is_string($testRunLogs));

        $this->assertMatchesRegularExpression("/" . $expectedLogs . "/", $testRunLogs);
    }
}
