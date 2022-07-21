<?php

declare(strict_types=1);

namespace Selrahcd\PhpunitTestRunLogger\SinglePassingTest;

use PHPUnit\Framework\TestCase;

class SomeTest extends TestCase
{

    public function test_it_passes(): void
    {
        $this->assertTrue(true);
    }
}
