<?php
declare(strict_types = 1);

namespace Tests\Alu\AdventOfCode\Year2025\Day6;

use Alu\AdventOfCode\Year2025\Day6\Part1;
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
123 328  51 64 
 45 64  387 23 
  6 98  215 314
*   +   *   +  
EOD, 4277556],
        ];
    }
}
