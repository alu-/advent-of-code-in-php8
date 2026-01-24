<?php

namespace Alu\AdventOfCode\Year2016\Day3;

use Iterator;

class VerticalTriangleIterator implements Iterator
{
    private int $position = 0;
    private int $chunk = 0;
    private readonly int $chunkCount;
    private readonly array $chunks;

    public function __construct(private string $input)
    {
        $this->chunks = $input
        |> (fn($rows) => explode("\n", $rows))
        |> (fn($rows) => array_map("trim", $rows))
        |> (fn($rows) => array_map(fn($row) => array_map('intval', preg_split('/\s+/', $row)), $rows))
        |> (fn($rows) => array_chunk($rows, 3));

        $this->chunkCount = count($this->chunks);
    }

    public function current(): mixed
    {
        return array_column($this->chunks[$this->chunk], $this->position);
    }

    public function next(): void
    {
        if ($this->position === 2) {
            $this->position = 0;
            $this->chunk++;
        } else {
            $this->position++;
        }
    }

    public function key(): mixed
    {
        return $this->chunk * 3 + ($this->position + 1);
    }

    public function valid(): bool
    {
        return $this->chunk < $this->chunkCount;
    }

    public function rewind(): void
    {
        $this->position = 0;
        $this->chunk = 0;
    }
}
