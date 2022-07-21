<?php

declare(strict_types=1);

namespace Selrahcd\PhpunitTestRunLogger\Fixtures;

use PHPUnit\Framework\TestCase;

class MultipleTestsWithFailingTest extends TestCase
{

    public function test_it_passes(): void
    {
        // @phpstan-ignore-next-line
        $this->assertTrue(false);
    }
}
