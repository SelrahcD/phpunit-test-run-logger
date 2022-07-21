<?php

declare(strict_types=1);


use PHPUnit\Framework\TestCase;

class StoresTheResultOfTestRunTest extends TestCase
{

    const PHPUNIT_BIN = __DIR__ . '/../vendor/bin/phpunit';

    /**
    * @test
    */
    public function when_passing_in_a_plain_text_file(): void {

        exec('cd ' . __DIR__ . ' && ' . self::PHPUNIT_BIN . ' -c phpunit-with-test-run-logger.xml fixtures/SinglePassingTest/SomeTest.php', $out);

        $this->assertFileEquals(__DIR__ . '/fixtures/SinglePassingTest/expected_logs', __DIR__ . '/test_run_logs');

    }
}
