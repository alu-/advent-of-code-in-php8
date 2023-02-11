<?php

namespace Alu\AdventOfCode\Year2022\Day3;

use Alu\AdventOfCode\Helpers\Solution;

class Part2 extends Solution
{
    public function run(): int
    {
        $groups = array_chunk($this->getInputLines(true), 3);
        $badges = [];
        foreach ($groups as $group) {
            $badges = array_merge($badges, array_unique(array_intersect(...array_map('str_split', $group))));
        }

        $priorities = array_merge(
            array_combine(range('a', 'z'), range(1, 26)),
            array_combine(range('A', 'Z'), range(27, 52)),
        );

        return array_reduce($badges, fn($carry, $item) => $priorities[$item] + $carry, 0);
    }
}
