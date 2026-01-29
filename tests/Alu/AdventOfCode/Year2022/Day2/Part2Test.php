<?php

namespace Tests\Alu\AdventOfCode\Year2022\Day2;

use Alu\AdventOfCode\Year2022\Day2\Part2;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\Alu\AdventOfCode\TestCase;

class Part2Test extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testRun($input, $output)
    {
        /** @var Part2 $solution */
        $solution = $this->getMockForPart(Part2::class);
        $solution->setInput($input);

        $this->assertSame($output, $solution->run());
    }

    public static function inputProvider(): array
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
