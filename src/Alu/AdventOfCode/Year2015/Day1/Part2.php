<?php

namespace Alu\AdventOfCode\Year2015\Day1;

use Alu\AdventOfCode\Helpers\{Solution, SolutionInterface};

class Part2 extends Solution implements SolutionInterface
{
    public function run(): int
    {
        $floor = 0;
        foreach (str_split($this->getInput()) as $position => $character) {
            $floor += match ($character) {
                '(' => 1,
                ')' => -1
            };

            if ($floor === -1) {
                return $position + 1;
            }
        }

        return 0;
    }
}
