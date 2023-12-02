<?php

namespace Alu\AdventOfCode\Year2015\Day14;

class Reindeer
{
    private bool $resting;
    private int $restTime;
    private int $stamina;
    private int $distanceTravelled;

    /**
     * @param string $name
     * @param int $distance
     * @param int $duration
     * @param int $restDuration
     */
    public function __construct(
        public string $name,
        public int    $distance,
        public int    $duration,
        public int    $restDuration
    )
    {
        $this->resting = false;
        $this->restTime = 0;
        $this->stamina = $this->duration;
        $this->distanceTravelled = 0;
    }

    /**
     * @return int
     */
    public function getDistanceTravelled(): int
    {
        return $this->distanceTravelled;
    }

    /**
     * @param bool $resting
     */
    public function setResting(bool $resting): void
    {
        $this->resting = $resting;
    }

    /**
     * @return bool
     */
    public function isResting(): bool
    {
        return $this->resting;
    }

    /**
     * @return void
     */
    public function race(): void
    {
        if ($this->isResting()) {
            $this->rest();
        } else {
            $this->travel();
            if ($this->needsRest()) {
                $this->setResting(true);
                $this->restTime = $this->restDuration;
            }
        }
    }

    public function rest(): void
    {
        $this->restTime -= 1;
        if ($this->restTime <= 0) {
            $this->setResting(false);
            $this->stamina = $this->duration;
        }
    }

    public function travel(): void
    {
        $this->distanceTravelled += $this->distance;
        $this->stamina -= 1;
    }

    private function needsRest(): bool
    {
        return $this->stamina === 0;
    }
}