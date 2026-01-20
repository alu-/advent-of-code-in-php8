<?php

namespace Alu\AdventOfCode\Year2025\Day8;

use SplHeap;

class DistanceHeap extends SplHeap
{
    protected function compare(mixed $value1, mixed $value2): int
    {
        return $value2->distance <=> $value1->distance;
    }
}
