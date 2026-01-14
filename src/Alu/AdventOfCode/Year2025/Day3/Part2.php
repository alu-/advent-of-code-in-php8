<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2025\Day3;

use Alu\AdventOfCode\Helpers\Solution;
use SplStack;

class Part2 extends Solution
{
    public function run(): int
    {
        $banks = $this->getInputLines(true);
        $n = 12;

        $joltage = 0;
        foreach ($banks as $bank) {
            $bank = array_map('intval', str_split($bank));

            $stack = new SplStack();
            $k = count($bank) - $n;
            foreach ($bank as $d) {
                while ($k > 0 && !$stack->isEmpty() && $stack->top() < $d) {
                    $stack->pop();
                    $k--;
                }

                $stack->push($d);
            }

            for (; $k > 0; $k--) {
                $stack->pop();
            }

            $joltage += intval(implode('', array_reverse(iterator_to_array($stack))));
        }

        return $joltage;
    }
}
