<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2018\Day2;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): int
    {
        return $this->getInputLines(true)
            |> (fn($lines) => array_map(fn($line) => count_chars($line, 1), $lines))
            |> (fn($lines) => array_reduce($lines, fn ($carry, $item) => [
                $carry[0] + (int) in_array(2, $item),
                $carry[1] + (int) in_array(3, $item),
            ], [0, 0]))
            |> (fn($sums) => $sums[0] * $sums[1]);
    }
}
