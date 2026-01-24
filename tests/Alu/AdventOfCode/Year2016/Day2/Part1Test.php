<?php
declare(strict_types = 1);

namespace Tests\Alu\AdventOfCode\Year2016\Day2;

use Alu\AdventOfCode\Year2016\Day2\Part1;
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
            ['RRRRR', 6],
            ['LLLLL', 4],
            ['UUUUU', 2],
            ['DDDDD', 8],
            [<<<'EOD'
ULL
RRDDD
LURDL
UUUUD
EOD, 1985],
        ];
    }
}
