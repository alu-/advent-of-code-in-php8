<?php

declare(strict_types=1);

namespace Alu\AdventOfCode\Year2025\Day1;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    protected Dial $dial;

    public function __construct()
    {
        parent::__construct();
        $this->dial = new Dial();
    }

    public function run(): int
    {
        $zeroCount = 0;
        foreach ($this->getInputLines(true) as $line) {
            $movement = self::parseMovement($line);
            switch ($movement->direction) {
                case Direction::LEFT:
                    $this->dial->decrement($movement->steps);
                    break;
                case Direction::RIGHT:
                    $this->dial->increment($movement->steps);
                    break;
            };

            if ($this->dial->get() === 0) {
                $zeroCount++;
            }
        }

        return $zeroCount;
    }

    protected static function parseMovement(string $line): Movement
    {
        return new Movement(Direction::from(substr($line, 0, 1)), (int) substr($line, 1));
    }
}
