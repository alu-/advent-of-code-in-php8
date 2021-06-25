<?php

namespace Alu\AdventOfCode\Year2015\Day4;

use Alu\AdventOfCode\Helpers\{Solution, SolutionInterface};

class Part1 extends Solution implements SolutionInterface
{
    public function run(): int
    {
        for ($number = 1; true; $number++) {
            $hash = md5($this->getInput() . $number);
            if (str_starts_with($hash, '00000')) {
                return $number;
            }
        }
    }
}
