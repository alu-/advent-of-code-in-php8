<?php

namespace Alu\AdventOfCode\Year2015\Day8;

use Alu\AdventOfCode\Helpers\Solution;

class Part2 extends Solution
{
    public function run(): int
    {
        $encoded_length = $characters_length = 0;
        foreach ($this->getInputLines(true) as $code) {
            $characters_length += strlen($code);
            $encoded_length += strlen(Part2::encode($code));
        }

        return $encoded_length - $characters_length;
    }

    /**
     * "Encode" string with addslashes
     * @param string $code
     * @return string
     */
    private static function encode(string $code): string
    {
        return sprintf('"%s"', addslashes($code));
    }
}
