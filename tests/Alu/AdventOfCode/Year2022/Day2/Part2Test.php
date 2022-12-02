<?php

namespace Tests\Alu\AdventOfCode\Year2022\Day2;

use Alu\AdventOfCode\Year2022\Day2\Part2;
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
A Y
B X
C Z

EOD, 12],
        ];
    }
}
