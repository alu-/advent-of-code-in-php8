<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day11\Password;

use Iterator;

class Generator implements Iterator
{
    private int $index = 0;
    private string $originalPassword;

    public function __construct(private string $password)
    {
        $this->originalPassword = $password;
    }

    public function current(): string
    {
        return $this->password;
    }

    public function next(): void
    {
        $this->index++;
        $this->password++;
    }

    public function key(): int
    {
        return $this->index;
    }

    public function valid(): bool
    {
        return true;
    }

    public function rewind(): void
    {
        $this->index = 0;
        $this->password = $this->originalPassword;
    }
}
