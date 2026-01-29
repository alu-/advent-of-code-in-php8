<?php

namespace Tests\Alu\AdventOfCode\Year2015\Day12;

use Alu\AdventOfCode\Year2015\Day12\Part2;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class Part2Test extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testRun($input, $output)
    {
        $solution = new Part2();
        $solution->setInput($input);

        $this->assertSame($output, $solution->run());
    }

    public static function inputProvider(): array
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
            ['[1,{"c":"red","b":2},3]', 4],
            ['{"d":"red","e":[1,2,3,4],"f":5}', 0],
            ['[1,"red",5]', 6],
        ];
    }
}
