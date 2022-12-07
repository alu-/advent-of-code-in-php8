<?php

namespace Alu\AdventOfCode\Year2022\Day7;

use Alu\AdventOfCode\Helpers\Solution;
use Exception;
use Generator;

class Part1 extends Solution
{
    public function run(): int
    {
        $filesystem = new Filesystem();
        foreach ($this->parseCommands() as $command) {
            match ($command->getName()) {
                'cd' => $filesystem->traverseTo($command->getArguments()[0]),
                'ls' => $filesystem->addFilesAndDirectories($command->getOutput())
            };
        }
        $filesystem->calculateSizes();

        $smallerDirectories = array_filter(
            iterator_to_array($filesystem, false),
            fn($item) => $item instanceof Directory && $item->getSize() <= 100000
        );

        return array_reduce($smallerDirectories, fn($carry, $item) => $carry + $item->getSize(), 0);
    }

    private function parseCommands(): Generator
    {
        $lines = $this->getInputLines(true);
        $commands = preg_grep("/^\\$ .*$/", $lines);
        for ($i = 0; $i < count($commands); $i++) {
            $command = new Command(current($commands));

            $start = key($commands);
            next($commands);
            $stop = key($commands);
            prev($commands);

            if ($stop - $start !== 1) {
                $end = $stop === null ? null : ($stop - $start) - 1;
                $command->setOutput(array_slice($lines, $start + 1, $end));
            }

            yield $command;
            next($commands);
        }
    }
}
