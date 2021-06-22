<?php

namespace Tests\Alu\AdventOfCode\Year2015\Day4;

use Alu\AdventOfCode\Year2015\Day4\Part1;
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
            ['abcdef', 609043],
            ['pqrstuv', 1048970]
        ];
    }
}
