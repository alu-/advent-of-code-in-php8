<?php
declare(strict_types = 1);

namespace Tests\Alu\AdventOfCode\Year2025\Day9;

use Alu\AdventOfCode\Year2025\Day9\Part1;
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
7,1
11,1
11,7
9,7
9,5
2,5
2,3
7,3
EOD, 50],
        ];
    }
}
