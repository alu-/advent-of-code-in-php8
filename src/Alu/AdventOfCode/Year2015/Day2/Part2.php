<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day2;

use Alu\AdventOfCode\Helpers\{Solution, SolutionInterface};

class Part2 extends Solution implements SolutionInterface
{
    public function run(): int
    {
        $presents = $this->getInputLines();
        return array_sum(array_map(function ($present) {
            list($length, $width, $height) = $sorted = array_map('intval', explode('x', $present));
            sort($sorted);

            $wrap = $sorted[0] + $sorted[0] + $sorted[1] + $sorted[1];
            $bow = $length * $width * $height;

            return $wrap + $bow;
        }, $presents));
    }
}
