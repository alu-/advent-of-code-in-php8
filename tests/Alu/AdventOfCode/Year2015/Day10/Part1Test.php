<?php
declare(strict_types=1);

namespace Tests\Alu\AdventOfCode\Year2015\Day10;

use Alu\AdventOfCode\Year2015\Day10\Part1;
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
            ['3113322113', 329356],
        ];
    }

    /**
     * @dataProvider lookAndSayInputProvider
     */
    public function testLookAndSay($input, $output)
    {
        $solution = new Part1();
        $this->assertSame($output, $solution->lookAndSay($input));
    }

    public function lookAndSayInputProvider(): array
    {
        return [
            ['1', '11'],
            ['11', '21'],
            ['21', '1211'],
            ['1211', '111221'],
            ['111221', '312211'],
        ];
    }
}
