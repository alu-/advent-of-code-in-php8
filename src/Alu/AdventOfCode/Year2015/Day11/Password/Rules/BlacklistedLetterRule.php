<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day11\Password\Rules;

use Alu\AdventOfCode\Year2015\Day11\Password\Rules\Contracts\RuleInterface;

class BlacklistedLetterRule implements RuleInterface
{
    private const BLACKLISTED_CHARACTERS = ['i', 'o', 'l'];

    public static function isValid(string $password): bool
    {
        foreach (self::BLACKLISTED_CHARACTERS as $CHARACTER) {
            if (str_contains($password, $CHARACTER)) {
                return false;
            }
        }

        return true;
    }
}
