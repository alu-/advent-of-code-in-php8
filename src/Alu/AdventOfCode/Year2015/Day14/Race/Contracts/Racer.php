<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day14\Race\Contracts;

interface Racer
{
    public function getName(): string;
    public function getSpeed(): int;
    public function getTravelDuration(): int;
    public function getRestDuration(): int;
    public function isResting(): bool;
    public function setResting(bool $resting): void;
    public function getDistance(): int;
    public function isOutOfStamina(): bool;
    public function race(): void;
}
