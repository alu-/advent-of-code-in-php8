<?php

namespace Tests\Alu\AdventOfCode;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase as PhpUnitTestCase;

class TestCase extends PhpUnitTestCase
{
    /**
     * @param string $className
     * @return MockObject
     */
    protected function getMockForPart(string $className): MockObject
    {
        return $this
            ->getMockBuilder($className)
            ->onlyMethods(['readInputFromFile'])
            ->getMock();
    }
}
