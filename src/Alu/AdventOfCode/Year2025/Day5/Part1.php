<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2025\Day5;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): int
    {
        list($ranges, $availableIds) = $this->getInput()
            |> self::parseIngredients(...);

        $freshCount = 0;
        foreach ($availableIds as $id) {
            foreach ($ranges as $range) {
                if ($id >= $range[0] && $id <= $range[1]) {
                    $freshCount++;
                    break;
                }
            }
        }

        return $freshCount;
    }

    private static function parseIngredients(string $ingredients): array
    {
        return $ingredients
                |> (fn(string $s) => explode("\n\n", $s))
                |> (fn(array $parts) => [
                    $parts[0]
                        |> (fn(string $s) => explode("\n", $s))
                        |> (fn(array $lines) => array_map(fn($s) => array_map('intval', explode('-', $s)), $lines)),
                    $parts[1]
                        |> (fn(string $s) => explode("\n", $s))
                        |> (fn(array $lines) => array_map('intval', $lines)),
                ]);
    }
}
