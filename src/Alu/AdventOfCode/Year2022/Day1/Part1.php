<?php

namespace Alu\AdventOfCode\Year2022\Day1;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): int
    {
        $dwarfs = [];
        foreach (explode("\n\n", $this->getInput()) as $dwarf) {
            $dwarfs[] = array_sum(array_map('intval', explode("\n", $dwarf)));
        }

        return max($dwarfs);
    }
}
