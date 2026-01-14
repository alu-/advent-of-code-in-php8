<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2025\Day4;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): int
    {
        $grid = self::parseGrid($this->getInput());
        $paperCount = 0;
        foreach ($grid->cells() as $cell) {
            if ($cell->type === CellType::Paper) {
                $neighbours = $cell->neighbours($grid);
                $papers = count(array_filter($neighbours, fn(Cell $neighbour) => $neighbour->type === CellType::Paper));
                if ($papers < 4) {
                    $paperCount++;
                }
            }
        }

        return $paperCount;
    }

    protected static function parseGrid(string $input): Grid
    {
        return new Grid(array_map(fn($l) => str_split($l), explode("\n", $input)));
    }
}
