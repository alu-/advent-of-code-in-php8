<?php

declare(strict_types=1);

namespace Alu\AdventOfCode\Year2025\Day1;

class Dial
{
    private int $value;
    private int $range;

    public function __construct(private int $initial = 50, private int $min = 0, private int $max = 99)
    {
        $this->value = $this->initial;
        $this->range = $max - $min + 1;
    }

    public function increment(int $steps = 1): void
    {
        $this->value = $this->normalize($this->value + $steps);
    }

    public function decrement(int $steps = 1): void
    {
        $this->value = $this->normalize($this->value - $steps);
    }

    public function get(): int
    {
        return $this->value;
    }

    private function normalize(int $value): int
    {
        return (($value - $this->min) % $this->range + $this->range) % $this->range + $this->min;
    }
}
