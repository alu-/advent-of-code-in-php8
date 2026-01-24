<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2016\Day2;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): int
    {
        $instructions = $this->getInputLines(true)
            |> (fn($rows) => array_map(fn($row) => array_map(fn($a) => Direction::from($a), str_split($row)), $rows));

        $code = '';
        $coordinateToDigit = [
            '0,0' => 1, '1,0' => 2, '2,0' => 3,
            '0,1' => 4, '1,1' => 5, '2,1' => 6,
            '0,2' => 7, '1,2' => 8, '2,2' => 9,
        ];
        $position = new Position(3, 3, 1, 1);
        foreach ($instructions as $directions) {
            foreach ($directions as $direction) {
                $position->move($direction);
            }
            $code .= $coordinateToDigit[(string) $position];
        }

        return (int) $code;
    }
}
