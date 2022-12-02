<?php

namespace Alu\AdventOfCode\Year2015\Day6;

use Alu\AdventOfCode\Helpers\Solution;

class Part2 extends Solution
{
    public function run(): int
    {
        $lightGrid = array_fill(0, 1000, array_fill(0, 1000, 0));
        foreach ($this->getInputLines() as $line) {
            list($instruction, $fromX, $fromY, $toX, $toY) = $this->parseInstruction($line);

            for ($x = $fromX; $x <= $toX; $x++) {
                for ($y = $fromY; $y <= $toY; $y++) {
                    $lightGrid[$x][$y] += match ($instruction) {
                        'turn on'  => 1,
                        'turn off' => $lightGrid[$x][$y] > 0 ? -1 : 0,
                        'toggle'   => 2
                    };
                }
            }
        }

        return array_sum(array_map('array_sum', $lightGrid));
    }

    private function parseInstruction(string $instruction): array
    {
        preg_match('/(turn on|toggle|turn off)\s(\d+),(\d+) through (\d+),(\d+)/', $instruction, $matches);
        array_shift($matches);

        return $matches;
    }
}
