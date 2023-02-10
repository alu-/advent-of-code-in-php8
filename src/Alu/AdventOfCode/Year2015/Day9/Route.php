<?php

namespace Alu\AdventOfCode\Year2015\Day9;

/**
 * A route presents a path, through a graph or otherwise.
 */
class Route
{
    public function __construct(private array $stops = [], private int|float $distance = 0)
    {
    }

    /**
     * Represent this route as a string.
     * @return string
     */
    public function __toString(): string
    {
        return implode(' > ', array_map(fn ($x) => $x->getName(), $this->stops));
    }

    /**
     * Add a stop to route.
     * @param Vertex $stop
     * @param int|float $distance
     * @return void
     */
    public function addStop(Vertex $stop, int|float $distance): void
    {
        $this->stops[] = $stop;
        $this->distance += $distance;
    }

    /**
     * Check if the route has a stop.
     * @param string $stopName
     * @return bool
     */
    public function hasStop(string $stopName): bool
    {
        foreach ($this->stops as $stop) {
            if ($stop->getName() === $stopName) {
                return true;
            }
        }

        return false;
    }

    /**
     * Gets the total distance of the route.
     * @return float|int
     */
    public function getDistance(): float|int
    {
        return $this->distance;
    }
}
