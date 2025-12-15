<?php

namespace Alu\AdventOfCode\Year2022\Day2;

use Alu\AdventOfCode\Helpers\Solution;
use Alu\AdventOfCode\Year2022\Day2\RoShamBo\Move;

class Part1 extends Solution
{
    public function run(): int
    {
        $score = 0;
        foreach ($this->getInputLines(true) as $match) {
            list($opponent, $you) = array_map(
                [Move::class, 'fromLetter'],
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
