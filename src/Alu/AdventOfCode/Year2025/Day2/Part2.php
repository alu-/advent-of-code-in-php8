<?php

declare(strict_types=1);

namespace Alu\AdventOfCode\Year2025\Day2;

class Part2 extends Part1
{
    public function run(): int
    {
        $invalidIds = [];
        foreach ($this->formatInput($this->getInput()) as $range) {
            foreach ($range as $id) {
                if ($this->isInvalidId($id)) {
                    $invalidIds[] = $id;
                }
            }
        }

        return array_sum($invalidIds);
    }

    private function isInvalidId(int $id): bool
    {
        return preg_match('/^(\d+)(?:\1)+$/', (string) $id) === 1;
    }
}
