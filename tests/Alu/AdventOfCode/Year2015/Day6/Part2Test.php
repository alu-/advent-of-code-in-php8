<?php
declare(strict_types=1);

namespace Tests\Alu\AdventOfCode\Year2015\Day6;

use Alu\AdventOfCode\Year2015\Day6\Part2;
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
            ['turn on 0,0 through 0,0', 1],
            ['toggle 0,0 through 999,999', 2000000]
        ];
    }
}
