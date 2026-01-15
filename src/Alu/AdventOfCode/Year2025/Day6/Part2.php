<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2025\Day6;

class Part2 extends Part1
{
    public function run(): int
    {
        $lines = $this->getInputLines()
                |> (fn($a) => array_filter($a));

        $operatorsLine = array_pop($lines);
        $operators = [];
        $positions = [];
        for ($i = 0; $i < strlen($operatorsLine); $i++) {
            if ($operatorsLine[$i] !== ' ') {
                $operators[] = $operatorsLine[$i];
                $positions[] = $i;
            }
        }

        $results = [];
        foreach ($positions as $key => $start) {
            $end = $positions[$key + 1] ?? strlen($lines[0]) + 1;
            $numbers = [];
            for ($i = $end - 2; $i >= $start; $i--) {
                $number = '';
                foreach ($lines as $line) {
                    $number .= $line[$i];
                }
                $numbers[] = (int) $number;
            }

            $results[] = parent::solve($numbers, $operators[$key]);
        }

        return array_sum($results);
    }
}
