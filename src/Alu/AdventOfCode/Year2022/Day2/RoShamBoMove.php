<?php

namespace Alu\AdventOfCode\Year2022\Day2;

enum RoShamBoMove
{
    case Rock;
    case Paper;
    case Scissors;

    /**
     * Returns the enum representing a letter
     * @param string $letter
     * @return RoShamBoMove
     */
    public static function fromLetter(string $letter): RoShamBoMove
    {
        return match ($letter) {
            'A', 'X' => RoShamBoMove::Rock,
            'B', 'Y' => RoShamBoMove::Paper,
            'C', 'Z' => RoShamBoMove::Scissors,
        };
    }

    /**
     * Whether this move beats another one
     * @param RoShamBoMove $move
     * @return bool
     */
    public function beats(RoShamBoMove $move): bool
    {
        return match ($this) {
            self::Rock     => $move === self::Scissors,
            self::Paper    => $move === self::Rock,
            self::Scissors => $move === self::Paper
        };
    }

    /**
     * Whether this move draws another one
     * @param RoShamBoMove $move
     * @return bool
     */
    public function draws(RoShamBoMove $move): bool
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