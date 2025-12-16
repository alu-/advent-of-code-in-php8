<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day8;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): int
    {
        $memory_length = $characters_length = 0;
        foreach ($this->getInputLines(true) as $code) {
            $characters_length += strlen($code);
            $memory_length += strlen(Part1::decode($code));
        }

        return $characters_length - $memory_length;
    }

    private static function decode(string $code): string
    {
        return stripcslashes(substr($code, 1, -1));
    }
}
