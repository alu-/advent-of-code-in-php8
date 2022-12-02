<?php

namespace Alu\AdventOfCode\Year2022\Day2;

use Alu\AdventOfCode\Helpers\{Solution, SolutionInterface};

class Part1 extends Solution implements SolutionInterface
{
    public function run(): int
    {
        $score = 0;
        foreach($this->getInputLines(true) as $match) {
            list($opponent, $you) = array_map(
                [RoShamBoMove::class, 'fromLetter'],
                explode(' ', $match)
            );

            $score += $you->score();
            if ($you->beats($opponent)) {
                $score += 6;
            } elseif ($you->draws($opponent)) {
                $score += 3;
            }
        }

        return $score;
    }
}