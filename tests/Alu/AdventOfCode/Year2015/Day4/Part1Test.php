<?php

namespace Tests\Alu\AdventOfCode\Year2015\Day4;

use Alu\AdventOfCode\Year2015\Day4\Part1;
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
            ['abcdef', 609043],
            ['pqrstuv', 1048970]
        ];
    }
}
