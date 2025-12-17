<?php

declare(strict_types=1);

namespace Alu\AdventOfCode\Year2025\Day2;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
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

    protected function formatInput(string $input): array
    {
        return array_map(fn($part) => range(...array_map('intval', explode('-', $part))), explode(",", $input));
    }

    private function isInvalidId(int $id): bool
    {
        return preg_match('/^(\d+)\1$/', (string) $id) === 1;
    }
}
