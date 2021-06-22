<?php

namespace Tests\Alu\AdventOfCode\Year2015\Day3;

use Alu\AdventOfCode\Year2015\Day3\Part2;
use PHPUnit\Framework\TestCase;

class Part2Test extends TestCase
{
    /**
     * @dataProvider inputProvider
     */
    public function testRun($input, $output)
    {
        $solution = new Part2();
        $solution->setInput($input);

        $this->assertSame($output, $solution->run());
    }

    public function inputProvider(): array
    {
        return [
            ['^v', 3],
            ['^>v<', 3],
            ['^v^v^v^v^v', 11]
        ];
    }
}
