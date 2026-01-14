<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2025\Day4;

class Part2 extends Part1
{
    public function run(): int
    {
        $grid = parent::parseGrid($this->getInput());
        $paperCount = 0;
        do {
            $removalCount = 0;
            foreach ($grid->cells() as $cell) {
                if ($cell->type === CellType::Paper) {
                    $neighbours = $cell->neighbours($grid);
                    $papers = count(
                        array_filter($neighbours, fn(Cell $neighbour) => $neighbour->type === CellType::Paper)
                    );
                    if ($papers < 4) {
                        $paperCount++;
                        $removalCount++;
                        $grid->set($cell->x, $cell->y, CellType::Empty);
                    }
                }
            }
        } while ($removalCount > 0);

        return $paperCount;
    }
}
