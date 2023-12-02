<?php

namespace Tests\Alu\AdventOfCode\Year2015\Day9;

use Alu\AdventOfCode\Year2015\Day9\Part2;
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
London to Dublin = 464
London to Belfast = 518
Dublin to Belfast = 141
EOD, 982],
        ];
    }
}
