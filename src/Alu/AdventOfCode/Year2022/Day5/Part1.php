<?php

namespace Alu\AdventOfCode\Year2022\Day5;

use Alu\AdventOfCode\Helpers\Solution;
use Generator;
use SplStack;

class Part1 extends Solution
{
    public function run(): string
    {
        list($stackMap, $instructions) = array_map(
            fn($item) => explode("\n", $item),
            explode("\n\n", $this->getInput())
        );

        $stacks = $this->createStacks($stackMap);
        $this->runInstructionsOnStack($instructions, $stacks);

        return array_reduce(
            $stacks,
            fn($carry, $item) => sprintf("%s%s", $carry, $item->top()),
            ""
        );
    }

    /**
     * Creates a one-based array of SplStacks
     * @param array $stackMap
     * @return array<SplStack>
     */
    public function createStacks(array &$stackMap): array
    {
        $stackCount = $this->getStackCountFromStackMap($stackMap);
        $stacks = [];
        for ($i = 1; $i <= $stackCount; $i++) {
            $stacks[$i] = new SplStack();
        }

        foreach ($stackMap as $line) {
            foreach ($this->getColumnsFromMap($line) as $index => $column) {
                if (!empty($column)) {
                    $stacks[$index + 1]->unshift($column);
                }
            }
        }

        return $stacks;
    }

    public function getStackCountFromStackMap(array &$stackMap): int
    {
        preg_match("/^.+(\d+)\s+$/", array_splice($stackMap, -1)[0], $matches);

        return (int) end($matches);
    }

    public function getColumnsFromMap(string $line): Generator
    {
        foreach (str_split($line, 4) as $line) {
            yield str_replace(["[", "]", " "], '', $line);
        }
    }

    public function runInstructionsOnStack(array $instructions, array $stacks): void
    {
        foreach ($instructions as $instruction) {
            if (preg_match("/move (\d+) from (\d+) to (\d+)/", $instruction, $matches)) {
                list(, $amount, $from, $to) = $matches;

                for ($i = 0; $i < $amount; $i++) {
                    $crate = $stacks[$from]->pop();
                    $stacks[$to]->push($crate);
                }
            }
        }
    }
}
