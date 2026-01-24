<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2016\Day3;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): int
    {
        return $this->getInputLines(true)
            |> (fn($rows) => array_map('trim', $rows))
            |> (fn($rows) => array_map(fn($row) => array_map('intval', preg_split('/\s+/', $row)), $rows))
            |> (fn($rows) => array_reduce(
                $rows,
                static fn($carry, $shape) => self::isValidTriangle(...$shape) ? ++$carry : $carry,
                0
            ));
    }

    protected static function isValidTriangle(int $a, int $b, int $c): bool
    {
        return $a + $b > $c && $a + $c > $b && $b + $c > $a;
    }
}
