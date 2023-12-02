<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day11\Password\Rules;

use Alu\AdventOfCode\Year2015\Day11\Password\Rules\Contracts\RuleInterface;

class DuplicationRule implements RuleInterface
{
    public static function isValid(string $password): bool
    {
        preg_match_all('/(.)\1{1}/', $password, $matches);

        return count($matches[0]) >= 2;
    }
}
