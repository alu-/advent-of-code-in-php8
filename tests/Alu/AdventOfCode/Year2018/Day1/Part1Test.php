<?php
declare(strict_types = 1);

namespace Tests\Alu\AdventOfCode\Year2018\Day1;

use Alu\AdventOfCode\Year2018\Day1\Part1;
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
+1
-2
+3
+1
EOD, 3],
            [<<<'EOD'
+1
+1
+1
EOD, 3],
            [<<<'EOD'
+1
+1
-2
EOD, 0],
            [<<<'EOD'
-1
-2
-3
EOD, -6],
        ];
    }
}
