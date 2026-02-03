<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2018\Day1;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): int
    {
        return $this->getInputLines(true)
            |> (fn($lines) => array_map(fn($a) => intval($a), $lines))
            |> array_sum(...);
    }
}
