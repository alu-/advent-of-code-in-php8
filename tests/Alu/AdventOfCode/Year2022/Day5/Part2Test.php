<?php

namespace Tests\Alu\AdventOfCode\Year2022\Day5;

use Alu\AdventOfCode\Year2022\Day5\Part2;
use Tests\Alu\AdventOfCode\TestCase;

class Part2Test extends TestCase
{
    /**
     * @dataProvider inputProvider
     */
    public function testRun($input, $output)
    {
        /** @var Part2 $solution */
        $solution = $this->getMockForPart(Part2::class);
        $solution->setInput($input);

        $this->assertSame($output, $solution->run());
    }

    public function inputProvider(): array
    {
        return [
            [<<<'EOD'
    [D]    
[N] [C]    
[Z] [M] [P]
 1   2   3 

move 1 from 2 to 1
move 3 from 1 to 3
move 2 from 2 to 1
move 1 from 1 to 2

EOD, "MCD"],
        ];
    }
}
