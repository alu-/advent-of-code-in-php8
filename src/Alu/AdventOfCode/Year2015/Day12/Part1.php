<?php

namespace Alu\AdventOfCode\Year2015\Day12;

use RecursiveArrayIterator;
use RecursiveIteratorIterator;
use Alu\AdventOfCode\Helpers\{Solution, SolutionInterface};

class Part1 extends Solution implements SolutionInterface
{
    public function run(): int
    {
        $answer = 0;
        $iterator = new IntegerFilterIterator(
            new RecursiveIteratorIterator(
                new RecursiveArrayIterator(
                    json_decode($this->getInput(), true)
                )
            )
        );
        foreach ($iterator as $integer) {
            $answer += $integer;
        }

        return $answer;
    }
}
