<?php

namespace Tests\Alu\AdventOfCode\Year2015\Day12;

use Alu\AdventOfCode\Year2015\Day12\Part1;
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
            ['[1,2,3]', 6],
            ['{"a":2,"b":4}', 6],
            ['[[[3]]]', 3],
            ['{"a":{"b":4},"c":-1}', 3],
            ['{"a":[-1,1]}', 0],
            ['[-1,{"a":1}]', 0],
            ['[]', 0],
            ['{}', 0],
        ];
    }
}
