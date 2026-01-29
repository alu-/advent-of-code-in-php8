<?php

namespace Tests\Alu\AdventOfCode\Year2015\Day14;

use Alu\AdventOfCode\Year2015\Day14\Part1;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class Part1Test extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testRun($input, $output)
    {
        $solution = new Part1();
        $solution->setInput($input);
        $solution->setRaceDuration(1000);

        $this->assertSame($output, $solution->run());
    }

    public static function inputProvider(): array
    {
        return [
            [<<<'EOD'
Comet can fly 14 km/s for 10 seconds, but then must rest for 127 seconds.
Dancer can fly 16 km/s for 11 seconds, but then must rest for 162 seconds.
EOD, 1120],
        ];
    }
}
