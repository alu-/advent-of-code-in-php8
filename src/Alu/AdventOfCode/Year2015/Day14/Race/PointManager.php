<?php

namespace Alu\AdventOfCode\Year2015\Day14\Race;

use Alu\AdventOfCode\Year2015\Day14\Race\Contracts\RaceInterface;

class PointManager implements RaceInterface
{
    private int $duration = 0;
    private array $points;

    /**
     * @param array<int, Reindeer> $participants
     */
    public function __construct(private readonly array $participants) {
        $names = array_map(fn($participant): string => $participant->name, $this->participants);
        $this->points = array_fill_keys($names, 0);
    }

    /**
     * @return void
     */
    public function advance(): void
    {
        foreach ($this->participants as $reindeer) {
            $reindeer->race();
        }

        $this->duration += 1;
        $this->awardPoints();
    }

    /**
     * @return array
     */
    public function leaders(): array
    {
        $mostDistanceTravelled = array_reduce($this->participants, function(int $carry, Reindeer $reindeer) {
            return $reindeer->getDistanceTravelled() > $carry ? $reindeer->getDistanceTravelled() : $carry;
        }, 0);

        return array_filter(
            $this->participants,
            fn(Reindeer $reindeer): bool => $reindeer->getDistanceTravelled() === $mostDistanceTravelled
        );
    }

    /**
     * @return void
     */
    private function awardPoints(): void
    {
        $leaders = $this->leaders();
        foreach ($leaders as $leader) {
            $this->points[$leader->name] += 1;
        }
    }

    /**
     * @return array
     */
    public function getPoints(): array
    {
        return $this->points;
    }
}