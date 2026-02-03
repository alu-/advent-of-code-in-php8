<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2018\Day1;

use Alu\AdventOfCode\Helpers\Solution;

class Part2 extends Solution
{
    public function run(): int
    {
        $changes = $this->getInputLines(true)
            |> (fn($lines) => array_map(fn($a) => intval($a), $lines));

        $frequencies = [0];
        while (true) {
            foreach ($changes as $change) {
                $frequency = array_last($frequencies) + $change;
                if (in_array($frequency, $frequencies)) {
                    return $frequency;
                } else {
                    $frequencies[] = $frequency;
                }
            }
        }
    }
}
