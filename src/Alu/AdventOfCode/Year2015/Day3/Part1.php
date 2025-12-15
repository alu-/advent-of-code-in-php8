<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day3;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): int
    {
        $houses = ['0x0'];
        $x = $y = 0;
        foreach (str_split($this->getInput()) as $direction) {
            switch ($direction) {
                case '>':
                    $x++;
                    break;
                case 'v':
                    $y--;
                    break;
                case '<':
                    $x--;
                    break;
                case '^':
                    $y++;
                    break;
            }

            $houses[] = sprintf('%dx%d', $x, $y);
        }

        return count(array_unique($houses));
    }
}
