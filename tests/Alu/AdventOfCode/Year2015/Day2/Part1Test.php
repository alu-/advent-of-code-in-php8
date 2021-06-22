<?php

namespace Tests\Alu\AdventOfCode\Year2015\Day2;

use Alu\AdventOfCode\Year2015\Day2\Part1;
use PHPUnit\Framework\TestCase;

class Part1Test extends TestCase
{
    /**
     * @dataProvider inputProvider
     */
    public function testRun($input, $output)
    {
        $solution = new Part1();
        $solution->setInput($input);

        $this->assertSame($output, $solution->run());
    }

    public function inputProvider(): array
    {
        return [
            ['2x3x4', 58],
            ['1x1x10', 43]
        ];
    }
}
