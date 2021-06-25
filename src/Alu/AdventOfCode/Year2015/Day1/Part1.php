<?php

namespace Alu\AdventOfCode\Year2015\Day1;

use Alu\AdventOfCode\Helpers\{Solution, SolutionInterface};

class Part1 extends Solution implements SolutionInterface
{
    public function run(): int
    {
        $characters = count_chars($this->getInput());

        return $characters[40] - $characters[41];
    }
}
