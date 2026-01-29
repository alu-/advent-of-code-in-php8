<?php
declare(strict_types=1);

namespace Tests\Alu\AdventOfCode\Year2015\Day7;

use Alu\AdventOfCode\Year2015\Day7\Part2;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\Alu\AdventOfCode\TestCase;

class Part2Test extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testRun($input, $output)
    {
        /** @var Part2 $solution */
        $solution = $this->getMockForPart(Part2::class);
        $solution->setInput($input);

        $this->assertSame($output, $solution->run());
    }

    public static function inputProvider(): array
    {
        return [
            ['123 -> a', 123],
            ["50 -> b\n50 -> c\nb AND c -> a", 50],
            ["5 -> b\n3 -> c\nb OR c -> a", 7],
            ["1 -> b\nb LSHIFT 2 -> a", 16],
            ["4 -> b\nb RSHIFT 2 -> a", 0],
            ["1 -> b\nNOT b -> a", 1],
            ["50 -> bb\n50 -> cc\nbb AND cc -> a", 50],
            ["5 -> bb\n3 -> cc\nbb OR cc -> a", 7],
            ["1 -> bb\nbb LSHIFT 2 -> a", 4],
            ["4 -> bb\nbb RSHIFT 2 -> a", 1],
            ["1 -> bb\nNOT bb -> a", 65534],
            ["1 -> bb\nbb -> a", 1],
            ["NOT bb -> g\n1 -> bb\nbb -> a", 1],
        ];
    }
}
