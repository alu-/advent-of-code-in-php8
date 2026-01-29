<?php

namespace Tests\Alu\AdventOfCode\Year2022\Day6;

use Alu\AdventOfCode\Year2022\Day6\Part1;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\Alu\AdventOfCode\TestCase;

class Part1Test extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testRun($input, $output)
    {
        /** @var Part1 $solution */
        $solution = $this->getMockForPart(Part1::class);
        $solution->setInput($input);

        $this->assertSame($output, $solution->run());
    }

    public static function inputProvider(): array
    {
        return [
            ['mjqjpqmgbljsphdztnvjfqwrcgsmlb', 7],
            ['bvwbjplbgvbhsrlpgdmjqwftvncz', 5],
            ['nppdvjthqldpwncqszvftbrmjlhg', 6],
            ['nznrnfrfntjfmvfwmzdfjlvtqnbhcprsg', 10],
            ['zcfzfwzzqfrljwzlrfnpqdbhtmscgvjw', 11]
        ];
    }
}
