<?php

namespace Alu\AdventOfCode\Year2015\Day3;

use Alu\AdventOfCode\Helpers\{Solution, SolutionInterface};

class Part2 extends Solution implements SolutionInterface
{
    public function run(): int
    {
        $houses = ['0x0', '0x0'];
        $x = $y = $rx = $ry = 0;
        foreach (str_split($this->getInput()) as $turn => $direction) {
            switch ($direction) {
                case '>':
                    $turn % 2 == 0 ? $x++ : $rx++;
                    break;
                case 'v':
                    $turn % 2 == 0 ? $y-- : $ry--;
                    break;
                case '<':
                    $turn % 2 == 0 ? $x-- : $rx--;
                    break;
                case '^':
                    $turn % 2 == 0 ? $y++ : $ry++;
                    break;
            }

            if ($turn % 2 == 0) {
                $houses[] = sprintf('%dx%d', $x, $y);
            } else {
                $houses[] = sprintf('%dx%d', $rx, $ry);
            }
        }

        return count(array_unique($houses));
    }
}
