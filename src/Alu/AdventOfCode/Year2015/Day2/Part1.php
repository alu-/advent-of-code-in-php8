<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day2;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): int
    {
        $presents = $this->getInputLines();
        return array_sum(array_map(function ($present) {
            list($length, $width, $height) = array_map('intval', explode('x', $present));
            $a = $length * $width;
            $b = $width * $height;
            $c = $height * $length;

            return 2 * $a + 2 * $b + 2 * $c + min([$a, $b, $c]);
        }, $presents));
    }
}
