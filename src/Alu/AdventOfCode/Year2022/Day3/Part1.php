<?php

namespace Alu\AdventOfCode\Year2022\Day3;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): int
    {
        $characters = [];
        foreach ($this->getInputLines(true) as $line) {
            $compartments = array_map('str_split', str_split($line, strlen($line) / 2));
            $characters = array_merge($characters, array_unique(array_intersect($compartments[0], $compartments[1])));
        }

        $priorities = array_merge(
            array_combine(range('a', 'z'), range(1, 26)),
            array_combine(range('A', 'Z'), range(27, 52)),
        );

        return array_reduce($characters, fn($carry, $item) => $priorities[$item] + $carry, 0);
    }
}
