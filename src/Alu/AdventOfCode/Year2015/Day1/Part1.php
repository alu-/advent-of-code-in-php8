<?php

namespace Alu\AdventOfCode\Year2015\Day1;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): int
    {
        $characters = count_chars($this->getInput());

        return $characters[40] - $characters[41];
    }
}
