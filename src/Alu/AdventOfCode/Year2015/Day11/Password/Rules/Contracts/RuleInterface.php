<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day11\Password\Rules\Contracts;

interface RuleInterface
{
    public static function isValid(string $password): bool;
}
