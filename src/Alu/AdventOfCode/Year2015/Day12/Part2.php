<?php

namespace Alu\AdventOfCode\Year2015\Day12;

use RecursiveArrayIterator;
use RecursiveIteratorIterator;
use Alu\AdventOfCode\Helpers\{Solution, SolutionInterface};

class Part2 extends Solution implements SolutionInterface
{
    public function run(): int
    {
        $answer = 0;
        $iterator = new IntegerFilterIterator(
            new RecursiveIteratorIterator(
                new RedRecursiveFilterIterator(
                    new RecursiveArrayIterator(
                        [json_decode($this->getInput())]
                    )
                ), RecursiveIteratorIterator::SELF_FIRST
            )
        );
        foreach ($iterator as $integer) {
            $answer += $integer;
        }

        return $answer;
    }
}
