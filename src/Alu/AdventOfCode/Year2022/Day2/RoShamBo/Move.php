<?php

namespace Alu\AdventOfCode\Year2022\Day2\RoShamBo;

enum Move
{
    case Rock;
    case Paper;
    case Scissors;

    /**
     * Returns the enum representing a letter
     * @param string $letter
     * @return Move
     */
    public static function fromLetter(string $letter): Move
    {
        return match ($letter) {
            'A', 'X' => Move::Rock,
            'B', 'Y' => Move::Paper,
            'C', 'Z' => Move::Scissors,
        };
    }

    /**
     * Whether this move beats another one
     * @param Move $move
     * @return bool
     */
    public function beats(Move $move): bool
    {
        return match ($this) {
            self::Rock     => $move === self::Scissors,
            self::Paper    => $move === self::Rock,
            self::Scissors => $move === self::Paper
        };
    }

    /**
     * Whether this move draws another one
     * @param Move $move
     * @return bool
     */
    public function draws(Move $move): bool
    {
        return $this === $move;
    }

    /**
     * Returns the score of this move
     * @return int
     */
    public function score(): int
    {
        return match ($this) {
            self::Rock     => 1,
            self::Paper    => 2,
            self::Scissors => 3
        };
    }
}