<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2025\Day4;

use Generator;

class Grid
{
    public function __construct(private array $grid)
    {
    }

    public function cells(): Generator
    {
        foreach ($this->grid as $y => $row) {
            foreach ($row as $x => $type) {
                yield new Cell($x, $y, CellType::tryFrom($type));
            }
        }
    }

    public function get(int $x, int $y): Cell
    {
        return new Cell($x, $y, CellType::tryFrom($this->grid[$y][$x]));
    }

    public function has(int $x, int $y): bool
    {
        return isset($this->grid[$y][$x]);
    }

    public function set(int $x, int $y, CellType $type): void
    {
        $this->grid[$y][$x] = $type->value;
    }
}
