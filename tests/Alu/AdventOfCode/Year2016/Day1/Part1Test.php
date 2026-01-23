<?php
declare(strict_types = 1);

namespace Tests\Alu\AdventOfCode\Year2016\Day1;

use Alu\AdventOfCode\Year2016\Day1\CardinalDirection;
use Alu\AdventOfCode\Year2016\Day1\Part1;
use Alu\AdventOfCode\Year2016\Day1\Rotation;
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
            ['R2, L3', 5],
            ['R2, R2, R2', 2],
            ['R5, L5, R5, R3', 12],
            ['R500', 500],
        ];
    }
}
