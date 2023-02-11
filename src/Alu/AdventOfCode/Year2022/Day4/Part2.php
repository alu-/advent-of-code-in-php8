<?php

namespace Alu\AdventOfCode\Year2022\Day4;

use Alu\AdventOfCode\Helpers\Solution;

class Part2 extends Solution
{
    public function run(): int
    {
        $pairs = 0;
        foreach ($this->getInputLines(true) as $line) {
            list($left, $right) = array_map(
                fn($item): Section => new Section(...array_map('intval', explode('-', $item))),
                explode(',', $line)
            );

            if ($left->hasOverlappingSections($right)) {
                $pairs += 1;
            }
        }

        return $pairs;
    }
}
