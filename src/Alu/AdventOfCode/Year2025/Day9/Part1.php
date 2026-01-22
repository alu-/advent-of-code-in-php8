<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2025\Day9;

use Alu\AdventOfCode\Helpers\Solution;
use function Alu\AdventOfCode\Helpers\pairs;

class Part1 extends Solution
{
    public function run(): int
    {
        $tiles = $this->getInputLines(true)
            |> (fn($rows) => array_map(fn($row) => array_map('intval', explode(',', $row)), $rows))
            |> (fn($rows) => array_map(fn($row) => new Point($row[0], $row[1]), $rows));

        $largest = 0;
        foreach (pairs($tiles) as $pair) {
            $dx = abs($pair[0]->x - $pair[1]->x) + 1;
            $dy = abs($pair[0]->y - $pair[1]->y) + 1;
            $area = $dx * $dy;

            if ($area > $largest) {
                $largest = $area;
            }
        }

        return $largest;
    }
}
