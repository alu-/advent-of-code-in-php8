<?php

namespace Alu\AdventOfCode\Year2022\Day7;

use RecursiveIterator;

class Directory implements RecursiveIterator
{
    private readonly string $path;
    private int $size = 0;
    private int $position = 0;
    private array $entries = [];

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function current(): mixed
    {
        return $this->entries[$this->position];
    }

    public function next(): void
    {
        $this->position++;
    }

    public function key(): mixed
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return array_key_exists($this->position, $this->entries);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function hasChildren(): bool
    {
        return !empty($this->entries[$this->position]) && $this->entries[$this->position] instanceof Directory;
    }

    public function getChildren(): ?RecursiveIterator
    {
        return $this->entries[$this->position];
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    public function addFile(File $file): void
    {
        $this->entries[] = $file;
    }

    public function addDirectory(Directory $directory): void
    {
        $this->entries[] = $directory;
    }

    public function findParent(string $path): Directory | false
    {
        if ($this->getPath() === $path) {
            return $this;
        }

        foreach ($this->entries as $entry) {
            if ($entry instanceof Directory) {
                if ($entry->getPath() === $path) {
                    return $entry;
                } else {
                    if (($parent = $entry->findParent($path)) !== false) {
                        return $parent;
                    };
                }
            }
        }

        return false;
    }

    public function hasDirectory(string $directory): bool
    {
        return !empty(array_filter($this->entries, function ($item) use ($directory): bool {
            return $item instanceof Directory && $item->getPath() === $directory;
        }));
    }

    public function calculateSizes(): int
    {
        $size = 0;
        foreach ($this->entries as $entry) {
            if ($entry instanceof File) {
                $size += $entry->getSize();
            } else {
                $size += $entry->calculateSizes();
            }
        }

        $this->size = $size;

        return $this->size;
    }

    public function getSize(): int
    {
        return $this->size;
    }
}
