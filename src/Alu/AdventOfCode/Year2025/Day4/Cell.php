<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2025\Day4;

readonly class Cell
{
    public function __construct(public int $x, public int $y, public CellType $type)
    {
    }

    public function neighbours(Grid $grid): array
    {
        $neighbours = [];

        $directions = [
            [0, -1], // top
            [1, -1], // top-right
            [1, 0], // right
            [1, 1], // bottom-right
            [0, 1], // bottom
            [-1, 1], // bottom-left
            [-1, 0], // left
            [-1, -1], // top-left

        ];

        foreach ($directions as [$dx, $dy]) {
            $nx = $this->x + $dx;
            $ny = $this->y + $dy;

            if ($grid->has($nx, $ny)) {
                $neighbours[] = $grid->get($nx, $ny);
            }
        }

        return $neighbours;
    }
}
