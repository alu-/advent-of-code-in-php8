<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day1;

use Alu\AdventOfCode\Helpers\Solution;

class Part2 extends Solution
{
    public function run(): int
    {
        $floor = 0;
        foreach (str_split($this->getInput()) as $position => $character) {
            $floor += match ($character) {
                '(' => 1,
                ')' => -1
            };

            if ($floor === -1) {
                return $position + 1;
            }
        }

        return 0;
    }
}
