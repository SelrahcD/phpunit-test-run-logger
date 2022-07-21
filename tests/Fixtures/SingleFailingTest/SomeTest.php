<?php

declare(strict_types=1);

namespace Selrahcd\PhpunitTestRunLogger\SingleFailingTest;

use PHPUnit\Framework\TestCase;

class SomeTest extends TestCase
{

    public function test_it_fails(): void
    {
        // @phpstan-ignore-next-line
        $this->assertTrue(false);
    }

    public function test_it_passes(): void
    {
        $this->assertTrue(true);
    }
}
