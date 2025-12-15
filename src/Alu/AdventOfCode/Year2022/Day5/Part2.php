<?php

namespace Alu\AdventOfCode\Year2022\Day5;

class Part2 extends Part1
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

    public function runInstructionsOnStack(array $instructions, array $stacks): void
    {
        foreach ($instructions as $instruction) {
            if (preg_match("/move (\d+) from (\d+) to (\d+)/", $instruction, $matches)) {
                list(, $amount, $from, $to) = $matches;

                $crates = [];
                for ($i = 0; $i < $amount; $i++) {
                    $crates[] = $stacks[$from]->pop();
                }

                foreach (array_reverse($crates) as $crate) {
                    $stacks[$to]->push($crate);
                }
            }
        }
    }
}
