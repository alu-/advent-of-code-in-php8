<?php

namespace Alu\AdventOfCode\Year2015\Day14\Race;

use Alu\AdventOfCode\Year2015\Day14\Race\Contracts\RaceInterface;

class Manager implements RaceInterface
{
    private int $duration = 0;

    /**
     * @param array<int, Reindeer> $participants
     */
    public function __construct(private readonly array $participants)
    {
    }

    public function advance(): void
    {
        foreach ($this->participants as $reindeer) {
            $reindeer->race();
        }

        $this->duration += 1;
    }

    public function winner(): Reindeer
    {
        return array_reduce($this->participants, function (Reindeer $carry, Reindeer $reindeer) {
            return $reindeer->getDistanceTravelled() > $carry->getDistanceTravelled() ? $reindeer : $carry;
        }, $this->participants[0]);
    }
}
