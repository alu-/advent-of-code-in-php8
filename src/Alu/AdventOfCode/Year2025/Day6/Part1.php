<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2025\Day6;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): int
    {
        list($numbers, $operators) = $this->getInputLines(true)
            |> self::parseInput(...);

        $results = [];
        for ($index = 0; $index < count($numbers[0]); $index++) {
            $operator = $operators[$index];
            $results[] = self::solve(array_column($numbers, $index), $operator);
        }

        return array_sum($results);
    }

    private static function parseInput(array $lines): array
    {
        $operators = array_pop($lines);

        return [
            $lines
                |> (fn(array $lines) => array_map(
                    fn(string $line) => (preg_match_all('/\d+/', $line, $m) ? array_map("intval", $m[0]) : []),
                    $lines
                )),
            preg_match_all('/[+*]/', $operators, $o) ? $o[0] : []
        ];
    }

    protected static function solve(array $values, string $operator)
    {
        return array_reduce($values, function ($carry, $item) use ($operator) {
            if ($carry === null) {
                return $item;
            }

            return match ($operator) {
                '+' => $carry + $item,
                '*' => $carry * $item
            };
        });
    }
}
