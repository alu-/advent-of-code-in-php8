<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day14\Race;

trait Raceable
{
    private bool $resting = false;
    private int $distance = 0;
    private int $stamina;
    private int $restTimer;

    public function __construct(
        private readonly string $name,
        private readonly int $speed,
        private readonly int $travelDuration,
        private readonly int $restDuration
    ) {
        $this->stamina = $this->travelDuration;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function race(): void
    {
        if ($this->isResting()) {
            $this->rest();
        } else {
            $this->decrementStamina();
            $this->setDistance($this->getDistance() + $this->getSpeed());

            if ($this->isOutOfStamina()) {
                $this->startResting();
            }
        }
    }

    public function isOutOfStamina(): bool
    {
        return $this->stamina === 0;
    }

    public function rest(): void
    {
        $this->restTimer--;
        if ($this->restTimer === 0) {
            $this->stamina = $this->getTravelDuration();
            $this->setResting(false);
        }
    }

    /**
     * @return int
     */
    public function getTravelDuration(): int
    {
        return $this->travelDuration;
    }

    /**
     * @return void
     */
    public function decrementStamina(): void
    {
        $this->stamina--;
    }

    public function getDistance(): int
    {
        return $this->distance;
    }

    /**
     * @param int $distance
     */
    public function setDistance(int $distance): void
    {
        $this->distance = $distance;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    public function startResting(): void
    {
        $this->setResting(true);
        $this->restTimer = $this->getRestDuration();
    }

    /**
     * @return int
     */
    public function getRestDuration(): int
    {
        return $this->restDuration;
    }

    /**
     * @return bool
     */
    public function isResting(): bool
    {
        return $this->resting;
    }

    /**
     * @param bool $resting
     */
    public function setResting(bool $resting): void
    {
        $this->resting = $resting;
    }
}
