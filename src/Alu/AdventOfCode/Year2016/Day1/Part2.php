<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2016\Day1;

use Alu\AdventOfCode\Helpers\Solution;

class Part2 extends Solution
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
        $visited = [];
        foreach ($directions as $direction) {
            $cardinal = $cardinal->rotate($direction->rotation);

            [$dx, $dy] = match ($cardinal) {
                CardinalDirection::NORTH => [0, 1],
                CardinalDirection::SOUTH => [0, -1],
                CardinalDirection::WEST => [-1, 0],
                CardinalDirection::EAST => [1, 0],
            };

            for ($i = 0; $i < $direction->steps; $i++) {
                $position->x += $dx;
                $position->y += $dy;

                $key = (string) $position;
                if (isset($visited[$key])) {
                    break 2;
                }
                $visited[$key] = true;
            }
        }

        return abs($position->x) + abs($position->y);
    }
}
