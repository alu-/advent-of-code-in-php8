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
        $iterator = new RecursiveIteratorIterator(
            new RecursiveArrayIterator(
                json_decode($this->getInput())
            )
        );
        foreach ($iterator as $leaf) {
            if (is_int($leaf)) {
                $answer += $leaf;
            }
        }

        return $answer;
    }
}
