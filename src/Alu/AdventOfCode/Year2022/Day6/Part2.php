<?php

namespace Alu\AdventOfCode\Year2022\Day6;

use InvalidArgumentException;

class Part2 extends Part1
{
    /**
     * @throws InvalidArgumentException
     */
    public function run(): int
    {
        foreach ($this->arrayChunkInclusive($this->getInput(), 14) as $index => $characters) {
            if (mb_strlen(count_chars($characters, 3)) === 14) {
                return $index + 14;
            }
        }

        throw new InvalidArgumentException("Puzzle input has no solution.");
    }
}
