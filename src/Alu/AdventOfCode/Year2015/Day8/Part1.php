<?php

namespace Alu\AdventOfCode\Year2015\Day8;

use Alu\AdventOfCode\Helpers\{Solution, SolutionInterface};

class Part1 extends Solution implements SolutionInterface
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

    /**
     * Parse code with eval.
     * @param string $code
     * @return string
     */
    private static function decode(string $code): string
    {
        /** @var string $decoded */
        eval('$decoded = ' . $code . ';');

        return $decoded;
    }
}
