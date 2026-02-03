<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2018\Day2;

use Alu\AdventOfCode\Helpers\Solution;
use function Alu\AdventOfCode\Helpers\pairs;

class Part2 extends Solution
{
    public function run(): string
    {
        return $this->getInputLines(true)
            |> pairs(...)
            |> iterator_to_array(...)
            |> (fn($pairs) => array_filter(
                $pairs,
                fn($pair) => count(array_diff_assoc(str_split($pair[0]), str_split($pair[1]))) == 1
            ))
            |> current(...)
            |> (fn($diff) => array_intersect(str_split($diff[0]), str_split($diff[1])))
            |> (fn($result) => implode('', $result));
    }
}
