<?php

declare(strict_types=1);

namespace Alu\AdventOfCode\Year2025\Day1;

final class Movement
{
    public function __construct(
        public readonly Direction $direction,
        public readonly int $steps,
    ) {
    }
}
