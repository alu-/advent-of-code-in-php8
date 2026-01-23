<?php

namespace Alu\AdventOfCode\Year2016\Day1;

class Direction
{
    public function __construct(public Rotation $rotation, public int $steps)
    {
    }
}
