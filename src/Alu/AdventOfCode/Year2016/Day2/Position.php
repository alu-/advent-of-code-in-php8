<?php

namespace Alu\AdventOfCode\Year2016\Day2;

/**
 * Represents a position in a two-dimensional grid with width and height boundaries.
 * Allows movement within the grid based on specified directions.
 */
class Position
{
    public function __construct(
        public int $width,
        public int $height,
        public int $x = 1,
        public int $y = 1
    ) {
    }

    public function __toString(): string
    {
        return sprintf('%s,%s', $this->x, $this->y);
    }

    public function move(Direction $direction): void
    {
        match ($direction) {
            Direction::UP    => $this->y > 0 && $this->y--,
            Direction::DOWN  => $this->y < $this->height - 1 && $this->y++,
            Direction::LEFT  => $this->x > 0 && $this->x--,
            Direction::RIGHT => $this->x < $this->width - 1 && $this->x++,
        };
    }
}
