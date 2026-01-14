<?php
declare(strict_types = 1);

namespace Tests\Alu\AdventOfCode\Year2025\Day3;

use Alu\AdventOfCode\Year2025\Day3\Part1;
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
987654321111111
811111111111119
234234234234278
818181911112111
EOD, 357],
        ];
    }
}
