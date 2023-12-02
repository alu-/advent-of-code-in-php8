<?php
declare(strict_types=1);

namespace Tests\Alu\AdventOfCode\Year2015\Day5;

use Alu\AdventOfCode\Year2015\Day5\Part1;
use PHPUnit\Framework\TestCase;

class Part1Test extends TestCase
{
    /**
     * @dataProvider inputProvider
     */
    public function testRun($input, $output)
    {
        $solution = new Part1();
        $solution->setInput($input);

        $this->assertSame($output, $solution->run());
    }

    public function inputProvider(): array
    {
        return [
            ['ugknbfddgicrmopn', 1],
            ['aaa', 1],
            ['jchzalrnumimnmhp', 0],
            ['haegwjzuvuyypxyu', 0],
            ['dvszwmarrgswjxmb', 0],
        ];
    }
}
