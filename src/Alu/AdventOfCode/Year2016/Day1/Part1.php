<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2016\Day1;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): int
    {
        $directions = $this->getInput()
                |> (fn($line) => explode(',', $line))
                |> (fn($rows) => array_map('trim', $rows))
                |> (fn($rows) => array_map(
                    fn($row) => new Direction(Rotation::from($row[0]), (int) substr($row, 1)),
                    $rows
                ));

        $cardinal = CardinalDirection::NORTH;
        $position = new PointMutable(0, 0);
        foreach ($directions as $direction) {
            $cardinal = $cardinal->rotate($direction->rotation);
            match ($cardinal) {
                CardinalDirection::NORTH => $position->y += $direction->steps,
                CardinalDirection::SOUTH => $position->y -= $direction->steps,
                CardinalDirection::WEST  => $position->x -= $direction->steps,
                CardinalDirection::EAST  => $position->x += $direction->steps,
            };
        }

        return abs($position->x) + abs($position->y);
    }
}
