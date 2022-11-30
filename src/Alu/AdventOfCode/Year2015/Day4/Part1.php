<?php

namespace Alu\AdventOfCode\Year2015\Day4;

use Alu\AdventOfCode\Helpers\{Solution, SolutionInterface};

/**
 * TODO: This implementation is slow, especially part 2. This is because of the md5 function which essentially is used
 *       in a bruteforce manner.
 *       One might be able to improve this by using parallel https://www.php.net/manual/en/book.parallel.php
 *       but installing extensions is out of the scope for Advent of Code.
 */
class Part1 extends Solution implements SolutionInterface
{
    public function run(): int
    {
        for ($number = 1; true; $number++) {
            $hash = md5($this->getInput() . $number);
            if (str_starts_with($hash, '00000')) {
                return $number;
            }
        }
    }
}
