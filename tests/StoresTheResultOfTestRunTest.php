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

        $this->assertFileEquals(__DIR__ . '/Fixtures/' . $fixture . '/expected_logs', __DIR__ . '/test_run_logs');

    }

    /**
     * @test
     */
    public function when_failing_in_a_plain_text_file(): void {
        $fixture = 'SingleFailingTest';

        $this->runATestFile($fixture);

        $this->assertFileEquals(__DIR__ . '/Fixtures/' . $fixture . '/expected_logs', __DIR__ . '/test_run_logs');
    }

    /**
     * @test
     */
    public function when_one_test_is_failing_in_a_plain_text_file(): void {
        $fixture = 'MultipleTests';

        $this->runATestFile($fixture);

        $this->assertFileEquals(__DIR__ . '/Fixtures/' . $fixture . '/expected_logs', __DIR__ . '/test_run_logs');
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
}
