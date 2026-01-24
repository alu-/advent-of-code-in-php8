<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2016\Day3;

class Part2 extends Part1
{
    public function run(): int
    {
        $shapes = new VerticalTriangleIterator($this->getInput(true));
        $validTriangles = 0;
        foreach ($shapes as $shape) {
            if (parent::isValidTriangle(...$shape)) {
                $validTriangles++;
            }
        }

        return $validTriangles;
    }
}
