<?php
declare(strict_types=1);

namespace Tests\Alu\AdventOfCode\Year2015\Day5;

use Alu\AdventOfCode\Year2015\Day5\Part2;
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
            ['qjhvhtzxzqqjkmpb', 1],
            ['xxyxx', 1],
            ['uurcxstgmygtbstg', 0],
            ['ieodomkazucvgmuy', 0]
        ];
    }
}
