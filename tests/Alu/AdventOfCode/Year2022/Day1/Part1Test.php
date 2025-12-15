<?php

namespace Tests\Alu\AdventOfCode\Year2022\Day1;

use Alu\AdventOfCode\Year2022\Day1\Part1;
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
1000
2000
3000

4000

5000
6000

7000
8000
9000

10000

EOD, 24000],
        ];
    }
}
