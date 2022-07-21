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

        exec('cd ' . __DIR__ . ' && ' . self::PHPUNIT_BIN . ' -c phpunit-with-test-run-logger.xml fixtures/SinglePassingTest/SomeTest.php');

        $this->assertFileEquals(__DIR__ . '/Fixtures/SinglePassingTest/expected_logs', __DIR__ . '/test_run_logs');
    }

    /**
     * @test
     */
    public function when_failing_in_a_plain_text_file(): void {

        exec('cd ' . __DIR__ . ' && ' . self::PHPUNIT_BIN . ' -c phpunit-with-test-run-logger.xml fixtures/SingleFailingTest/SomeTest.php');

        $this->assertFileEquals(__DIR__ . '/Fixtures/SingleFailingTest/expected_logs', __DIR__ . '/test_run_logs');
    }
}
