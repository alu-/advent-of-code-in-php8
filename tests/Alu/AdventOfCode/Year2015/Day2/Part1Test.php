<?php

namespace Tests\Alu\AdventOfCode\Year2015\Day2;

use Alu\AdventOfCode\Year2015\Day2\Part1;
use Tests\Alu\AdventOfCode\TestCase;

class Part1Test extends TestCase
{
    /**
     * @dataProvider inputProvider
     */
    public function testRun($input, $output)
    {
        /** @var Part1 $solution */
        $solution = $this->getMockForPart(Part1::class);
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
