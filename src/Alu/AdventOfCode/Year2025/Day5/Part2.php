<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2025\Day5;

use Alu\AdventOfCode\Helpers\Solution;

class Part2 extends Solution
{
    public function run(): int
    {
        return $this->getInput()
            |> self::parseIngredients(...)
            |> self::normalizeRanges(...)
            |> (fn (array $ranges) => array_reduce(
                $ranges,
                fn (int $sum, array $range) => $sum + ($range[1] - $range[0] + 1),
                0
            ));
    }

    private static function parseIngredients(string $ingredients): array
    {
        return $ingredients
                |> (fn(string $s) => explode("\n\n", $s))
                |> (fn(array $parts) => [
                    $parts[0]
                        |> (fn(string $s) => explode("\n", $s))
                        |> (fn(array $lines) => array_map(fn($s) => array_map('intval', explode('-', $s)), $lines))
                ])
                |> current(...);
    }

    /**
     * Take an array of potentially overlapping ranges and normalize them so that the resulting ranges do not overlap.
     * @param array $ranges
     * @return array
     */
    private static function normalizeRanges(array $ranges): array
    {
        return $ranges
            |> (function (array $ranges): array {
                usort($ranges, fn($a, $b) => $a[0] > $b[0] ? 1 : -1);

                $normalized = [array_shift($ranges)];
                while (count($ranges)) {
                    $next = array_shift($ranges);
                    if ($next[0] <= array_last($normalized)[0] || $next[0] <= array_last($normalized)[1]) {
                        $next[0] = array_last($normalized)[1] + 1;
                        if ($next[0] > $next[1]) {
                            continue;
                        }
                    }
                    $normalized[] = [$next[0], $next[1]];
                }

                return $normalized;
            });
    }
}
