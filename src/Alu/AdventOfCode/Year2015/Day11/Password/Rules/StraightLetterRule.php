<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day11\Password\Rules;

use Alu\AdventOfCode\Year2015\Day11\Password\Rules\Contracts\RuleInterface;

class StraightLetterRule implements RuleInterface
{
    public static function isValid(string $password): bool
    {
        for ($i = 0; $i <= strlen($password) - 3; $i++) {
            if (
                ord($password[$i + 1]) - ord($password[$i]) === 1 &&
                ord($password[$i + 2]) - ord($password[$i + 1]) === 1
            ) {
                return true;
            }
        }

        return false;
    }
}
