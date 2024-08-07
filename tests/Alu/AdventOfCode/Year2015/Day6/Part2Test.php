<?php
declare(strict_types=1);

namespace Tests\Alu\AdventOfCode\Year2015\Day6;

use Alu\AdventOfCode\Year2015\Day6\Part2;
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
            ['turn on 0,0 through 0,0', 1],
            ['toggle 0,0 through 999,999', 2000000]
        ];
    }
}
