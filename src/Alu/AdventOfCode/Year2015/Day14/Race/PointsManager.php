<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day14\Race;

use Alu\AdventOfCode\Year2015\Day14\Race\Contracts\Racer;

class PointsManager extends Manager
{
    private array $points = [];

    /**
     * @param Racer $racer
     * @return void
     */
    public function addParticipant(Racer $racer): void
    {
        parent::addParticipant($racer);
        $this->points[$racer->getName()] = 0;
    }

    protected function advance(): void
    {
        parent::advance();

        $this->awardPoints();
    }

    private function awardPoints(): void
    {
        $maxDistance = array_reduce($this->participants, function($carry, $x) {
            return $x->getDistance() > $carry ? $x->getDistance() : $carry;
        }, -INF);

        foreach ($this->participants as $participant) {
            if ($participant->getDistance() == $maxDistance) {
                $this->points[$participant->getName()] += 1;
            }
        }
    }

    public function getRacePositions(): array
    {
        arsort($this->points);
        return $this->points;
    }
}
