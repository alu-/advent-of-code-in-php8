<?php
declare(strict_types=1);

namespace Tests\Alu\AdventOfCode\Year2015\Day3;

use Alu\AdventOfCode\Year2015\Day3\Part2;
use Tests\Alu\AdventOfCode\TestCase;

class Part2Test extends TestCase
{
    /**
     * @dataProvider inputProvider
     */
    public function testRun($input, $output)
    {
        /** @var Part2 $solution */
        $solution = $this->getMockForPart(Part2::class);
        $solution->setInput($input);

        $this->assertSame($output, $solution->run());
    }

    public function inputProvider(): array
    {
        return [
            ['^v', 3],
            ['^>v<', 3],
            ['^v^v^v^v^v', 11]
        ];
    }
}
