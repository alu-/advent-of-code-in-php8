<?php

namespace Tests\Alu\AdventOfCode\Year2022\Day2;

use Alu\AdventOfCode\Year2022\Day2\Part1;
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
            [<<<'EOD'
A Y
B X
C Z

EOD, 15],
        ];
    }
}
