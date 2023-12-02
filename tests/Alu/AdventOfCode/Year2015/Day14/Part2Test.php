<?php

namespace Tests\Alu\AdventOfCode\Year2015\Day14;

use Alu\AdventOfCode\Year2015\Day14\Part2;
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
        $solution->setRaceDuration(1000);

        $this->assertSame($output, $solution->run());
    }

    public function inputProvider(): array
    {
        return [
            [<<<'EOD'
Comet can fly 14 km/s for 10 seconds, but then must rest for 127 seconds.
Dancer can fly 16 km/s for 11 seconds, but then must rest for 162 seconds.
EOD, 689],
        ];
    }
}
