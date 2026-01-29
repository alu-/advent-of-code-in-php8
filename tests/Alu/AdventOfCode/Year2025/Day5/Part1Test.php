<?php
declare(strict_types = 1);

namespace Tests\Alu\AdventOfCode\Year2025\Day5;

use Alu\AdventOfCode\Year2025\Day5\Part1;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\Alu\AdventOfCode\TestCase;

class Part1Test extends TestCase
{
    #[DataProvider('inputProvider')]
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
3-5
10-14
16-20
12-18

1
5
8
11
17
32
EOD, 3],
        ];
    }
}
