<?php
declare(strict_types=1);

namespace Tests\Alu\AdventOfCode\Year2015\Day1;

use Alu\AdventOfCode\Year2015\Day1\Part1;
use Tests\Alu\AdventOfCode\TestCase;

class Part1Test extends TestCase
{
    /**
     * @dataProvider inputProvider
     */
    public function testRun($input, $output)
    {
        /** @var Part1 $solution */
        $solution = $this->getMockForPart(Part1::class);
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
