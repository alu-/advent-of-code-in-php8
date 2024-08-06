<?php

namespace Alu\AdventOfCode\Year2022\Day6;

use Alu\AdventOfCode\Helpers\Solution;
use Generator;
use InvalidArgumentException;

class Part1 extends Solution
{
    /**
     * @throws InvalidArgumentException
     */
    public function run(): int
    {
        foreach ($this->arrayChunkInclusive($this->getInput(), 4) as $index => $characters) {
            if (mb_strlen(count_chars($characters, 3)) === 4) {
                return $index + 4;
            }
        }

        throw new InvalidArgumentException("Puzzle input has no solution.");
    }

    /**
     * Return chunks from a string with overlapping characters
     * E.g "abcd" with length of 2 will generate ['ab', 'bc', 'cd']
     * @param string $input
     * @param int $length
     * @return Generator<string>
     */
    protected function arrayChunkInclusive(string $input, int $length): Generator
    {
        $inputLength = mb_strlen($input);
        for ($i = 0; $i < $inputLength; $i++) {
            yield mb_substr($input, $i, $length);
        }
    }
}
