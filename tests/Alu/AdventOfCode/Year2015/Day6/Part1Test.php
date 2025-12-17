<?php
declare(strict_types=1);

namespace Tests\Alu\AdventOfCode\Year2015\Day6;

use Alu\AdventOfCode\Year2015\Day6\Part1;
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
            ['turn on 0,0 through 999,999', 1000000],
            ['toggle 0,0 through 999,0', 1000],
            ['turn off 499,499 through 500,500', 0]
        ];
    }
}
