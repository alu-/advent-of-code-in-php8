<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2025\Day8;

readonly class Distance
{
    public function __construct(public int $distance, public Junction $a, public Junction $b)
    {
    }
}
