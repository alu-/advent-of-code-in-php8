<?php
declare(strict_types = 1);

namespace Tests\Alu\AdventOfCode\Year2025\Day6;

use Alu\AdventOfCode\Year2025\Day6\Part2;
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
123 328  51 64 
 45 64  387 23 
  6 98  215 314
*   +   *   +  
EOD, 3263827],
        ];
    }
}
