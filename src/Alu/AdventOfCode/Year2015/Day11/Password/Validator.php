<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day11\Password;

use Alu\AdventOfCode\Year2015\Day11\Password\Rules\BlacklistedLetterRule;
use Alu\AdventOfCode\Year2015\Day11\Password\Rules\DuplicationRule;
use Alu\AdventOfCode\Year2015\Day11\Password\Rules\StraightLetterRule;

class Validator
{
    private static array $rules = [
        BlacklistedLetterRule::class,
        StraightLetterRule::class,
        DuplicationRule::class
    ];

    public static function isValid(string $password): bool
    {
        foreach (self::$rules as $rule) {
            if (!call_user_func([$rule, 'isValid'], $password)) {
                return false;
            }
        }

        return true;
    }
}
