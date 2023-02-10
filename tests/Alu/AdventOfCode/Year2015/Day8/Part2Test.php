<?php
declare(strict_types=1);

namespace Tests\Alu\AdventOfCode\Year2015\Day8;

use Alu\AdventOfCode\Year2015\Day8\Part2;
use PHPUnit\Framework\TestCase;

class Part2Test extends TestCase
{
    /**
     * @dataProvider inputProvider
     */
    public function testRun($input, $output)
    {
        $solution = new Part2();
        $solution->setInput($input);

        $this->assertSame($output, $solution->run());
    }

    public function inputProvider(): array
    {
        return [
            [<<<'EOD'
""
"abc"
"aaa\"aaa"
"\x27"
EOD, 19]
        ];
    }
}
