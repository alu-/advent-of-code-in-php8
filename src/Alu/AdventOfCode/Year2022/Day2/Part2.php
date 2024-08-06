<?php

namespace Alu\AdventOfCode\Year2022\Day2;

use Alu\AdventOfCode\Helpers\Solution;
use Alu\AdventOfCode\Year2022\Day2\RoShamBo\Move;
use Alu\AdventOfCode\Year2022\Day2\RoShamBo\Outcome;

class Part2 extends Solution
{
    public function run(): int
    {
        $score = 0;
        foreach ($this->getInputLines(true) as $match) {
            $opponent = Move::fromLetter($match[0]);
            $expectedOutcome = Outcome::from($match[2]);
            $moves = array_filter(Move::cases(), fn($x) => $x !== $opponent);
            $you = match ($expectedOutcome) {
                Outcome::Draw => Move::fromLetter($match[0]),
                Outcome::Lose => current(array_filter($moves, fn($x) => $opponent->beats($x))),
                Outcome::Win => current(array_filter($moves, fn($x) => !$opponent->beats($x))),
            };

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
