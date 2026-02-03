<?php
declare(strict_types = 1);

namespace Tests\Alu\AdventOfCode\Year2018\Day1;

use Alu\AdventOfCode\Year2018\Day1\Part2;
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
            [<<<'EOD'
+1
-2
+3
+1
EOD, 2],
            [<<<'EOD'
+1
-1
EOD, 0],
            [<<<'EOD'
+3
+3
+4
-2
-4
EOD, 10],
            [<<<'EOD'
-6
+3
+8
+5
-6
EOD, 5],
            [<<<'EOD'
+7
+7
-2
-7
-4
EOD, 14],
        ];
    }
}
