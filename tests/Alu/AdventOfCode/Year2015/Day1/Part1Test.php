<?php
declare(strict_types=1);

namespace Tests\Alu\AdventOfCode\Year2015\Day1;

use Alu\AdventOfCode\Year2015\Day1\Part1;
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
            ['(())', 0],
            ['()()', 0],
            ['))(((((', 3],
            ['())', -1],
            ['))(', -1],
            [')))', -3],
            [')())())', -3]
        ];
    }
}
