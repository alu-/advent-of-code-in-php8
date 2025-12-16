<?php

namespace Tests\Alu\AdventOfCode\Year2025\Day1;

use Alu\AdventOfCode\Year2025\Day1\Part1;
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
L68
L30
R48
L5
R60
L55
L1
L99
R14
L82

EOD, 3],
        ];
    }
}
