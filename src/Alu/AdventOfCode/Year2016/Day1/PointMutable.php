<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2016\Day1;

class PointMutable
{
    public function __construct(public int|float $x, public int|float $y)
    {
    }

    public function __toString(): string
    {
        return $this->x . ',' . $this->y;
    }
}
