<?php

namespace Tests\Alu\AdventOfCode\Year2022\Day2;

use Alu\AdventOfCode\Year2022\Day2\Part1;
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
            [<<<'EOD'
A Y
B X
C Z

EOD, 15],
        ];
    }
}
