<?php

namespace Alu\AdventOfCode\Year2022\Day7;

class Part2 extends Part1
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

        $filesystemTotalSize = 70000000;
        $filesystemTargetSize = 30000000;
        $filesystemCurrentSize = $filesystem->getRoot()->getSize();
        $filesystemUnusedSpace = $filesystemTotalSize - $filesystemCurrentSize;

        $sizes = [$filesystem->getRoot()->getSize()];
        foreach ($filesystem as $path) {
            if ($path instanceof Directory) {
                if ($path->getSize() + $filesystemUnusedSpace >= $filesystemTargetSize) {
                    $sizes[] = $path->getSize();
                }
            }
        }

        return min($sizes);
    }
}
