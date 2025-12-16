<?php

namespace Alu\AdventOfCode\Year2025\Day1;

class Part2 extends Part1
{
    public function run(): int
    {
        $zeroCount = 0;
        foreach ($this->getInputLines(true) as $line) {
            $movement = self::parseMovement($line);
            $method = match ($movement->direction) {
                Direction::LEFT => "decrement",
                Direction::RIGHT => "increment"
            };

            for ($i = 0; $i < $movement->steps; $i++) {
                $this->dial->{$method}();
                if ($this->dial->get() === 0) {
                    $zeroCount++;
                }
            }
        }

        return $zeroCount;
    }
}
