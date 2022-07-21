<?php

declare(strict_types=1);

namespace Selrahcd\PhpunitTestRunLogger\Fixtures;

use PHPUnit\Framework\TestCase;

class SinglePassingTest extends TestCase
{

    public function test_it_passes(): void
    {
        $this->assertTrue(true);
    }
}
