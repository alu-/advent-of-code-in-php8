<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2025\Day3;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): int
    {
        $banks = $this->getInputLines(true);
        $joltage = 0;
        foreach ($banks as $bank) {
            $highestOffset = 0;
            for ($offset = 0; $offset < strlen($bank) - 1; $offset++) {
                if ($bank[$offset] > $bank[$highestOffset]) {
                    $highestOffset = $offset;
                }
            }

            $right = max(str_split(substr($bank, $highestOffset + 1)));
            $joltage += (int) sprintf('%s%s', $bank[$highestOffset], $right);
        }

        return $joltage;
    }
}
