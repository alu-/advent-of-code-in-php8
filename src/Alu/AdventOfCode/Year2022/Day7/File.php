<?php

namespace Alu\AdventOfCode\Year2022\Day7;

class File
{
    public function __construct(private readonly string $path, private readonly int $size)
    {
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }
}
