<?php

namespace Alu\AdventOfCode\Year2015\Day9;

class Part2 extends Part1
{
    public function run(): int
    {
        return max($this->getDistances());
    }
}
