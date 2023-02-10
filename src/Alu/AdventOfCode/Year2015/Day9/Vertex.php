<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day9;

class Vertex
{
    public function __construct(
        private readonly string $name,
        private readonly array $metadata = []
    ) {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getMetadata(): array
    {
        return $this->metadata;
    }
}
