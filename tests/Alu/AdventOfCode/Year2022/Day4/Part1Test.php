<?php

namespace Tests\Alu\AdventOfCode\Year2022\Day4;

use Alu\AdventOfCode\Year2022\Day4\Part1;
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

    public static function inputProvider(): array
    {
        return [
            [<<<'EOD'
2-4,6-8
2-3,4-5
5-7,7-9
2-8,3-7
6-6,4-6
2-6,4-8

EOD, 2],
        ];
    }
}
