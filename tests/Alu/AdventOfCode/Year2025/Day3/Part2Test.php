<?php
declare(strict_types = 1);

namespace Tests\Alu\AdventOfCode\Year2025\Day3;

use Alu\AdventOfCode\Year2025\Day3\Part2;
use Tests\Alu\AdventOfCode\TestCase;

class Part2Test extends TestCase
{
    /**
     * @dataProvider inputProvider
     */
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
987654321111111
811111111111119
234234234234278
818181911112111
EOD, 3121910778619],
        ];
    }
}
