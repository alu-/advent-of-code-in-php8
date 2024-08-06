<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day5;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): int
    {
        return count(array_filter($this->getInputLines(), function (string $subject) {
            return $this->hasThreeVowels($subject)
                && $this->hasRepeatingLetter($subject)
                && !$this->containsBadWord($subject);
        }));
    }

    private function hasThreeVowels(string $subject): bool
    {
        return preg_match_all('/[aeiou]/', $subject) >= 3;
    }

    private function hasRepeatingLetter(string $subject): bool
    {
        return preg_match('/(.)\1+/', $subject, $matches) === 1;
    }

    private function containsBadWord(string $subject): bool
    {
        foreach (['ab', 'cd', 'pq', 'xy'] as $badWord) {
            if (str_contains($subject, $badWord)) {
                return true;
            }
        }

        return false;
    }
}
