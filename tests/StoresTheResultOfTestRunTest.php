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
        $this->assertTheCorrectFileIsCreated('SinglePassingTest');
    }

    /**
     * @test
     */
    public function when_failing_in_a_plain_text_file(): void {
        $this->assertTheCorrectFileIsCreated('SingleFailingTest');
    }

    /**
     * @test
     */
    public function when_one_test_is_failing_in_a_plain_text_file(): void {
        $this->assertTheCorrectFileIsCreated('MultipleTests');
    }

    /**
     * @param string $fixture
     * @return void
     */
    private function assertTheCorrectFileIsCreated(string $fixture): void
    {
        exec(
            'cd ' . __DIR__ . ' && ' . self::PHPUNIT_BIN . ' -c phpunit-with-test-run-logger.xml fixtures/' . $fixture . '/SomeTest.php'
        );

        $this->assertFileEquals(__DIR__ . '/Fixtures/' . $fixture . '/expected_logs', __DIR__ . '/test_run_logs');
    }
}
