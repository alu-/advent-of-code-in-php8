<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day5;

use Alu\AdventOfCode\Helpers\Solution;

class Part2 extends Solution
{
    public function run(): int
    {
        return count(array_filter($this->getInputLines(), function (string $subject) {
            return $this->hasPairsWithoutOverlap($subject) && $this->hasRepeatingLetterWithSeparator($subject);
        }));
    }

    private function hasPairsWithoutOverlap(string $subject): bool
    {
        return preg_match('/(..).*\1/', $subject) === 1;
    }

    private function hasRepeatingLetterWithSeparator(string $subject): bool
    {
        return preg_match('/(.).\1/', $subject) === 1;
    }
}
