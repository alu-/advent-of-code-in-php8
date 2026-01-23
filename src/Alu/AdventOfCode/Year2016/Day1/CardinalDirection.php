<?php

namespace Alu\AdventOfCode\Year2016\Day1;

enum CardinalDirection: string
{
    case NORTH = 'N';
    case EAST  = 'E';
    case SOUTH = 'S';
    case WEST  = 'W';

    public function label(): string
    {
        return match ($this) {
            self::NORTH => 'North',
            self::EAST  => 'East',
            self::SOUTH => 'South',
            self::WEST  => 'West',
        };
    }

    public function rotate(Rotation $rotation): self
    {
        return match ($this) {
            self::NORTH => $rotation === Rotation::RIGHT ? self::EAST  : self::WEST,
            self::EAST  => $rotation === Rotation::RIGHT ? self::SOUTH : self::NORTH,
            self::SOUTH => $rotation === Rotation::RIGHT ? self::WEST  : self::EAST,
            self::WEST  => $rotation === Rotation::RIGHT ? self::NORTH : self::SOUTH,
        };
    }

    public function opposite(): self
    {
        return match ($this) {
            self::NORTH => self::SOUTH,
            self::EAST  => self::WEST,
            self::SOUTH => self::NORTH,
            self::WEST  => self::EAST,
        };
    }

    public function isVertical(): bool
    {
        return $this === self::NORTH || $this === self::SOUTH;
    }

    public function isHorizontal(): bool
    {
        return $this === self::EAST || $this === self::WEST;
    }
}
