<?php

namespace Tests\Alu\AdventOfCode\Year2015\Day11;

use Alu\AdventOfCode\Year2015\Day11\Part1;
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

    public static function inputProvider(): array
    {
        return [
            ['abcdefgh', 'abcdffaa'],
            ['ghijklmn', 'ghjaabcc']
        ];
    }
}
