<?php

namespace Tests\Alu\AdventOfCode\Year2022\Day1;

use Alu\AdventOfCode\Year2022\Day1\Part2;
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

EOD, 45000],
        ];
    }
}
