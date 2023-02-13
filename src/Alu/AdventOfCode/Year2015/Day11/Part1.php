<?php

namespace Alu\AdventOfCode\Year2015\Day11;

use Alu\AdventOfCode\Year2015\Day11\Password\Generator as PasswordGenerator;
use Alu\AdventOfCode\Year2015\Day11\Password\Validator as PasswordValidator;
use Alu\AdventOfCode\Helpers\{Solution, SolutionInterface};

class Part1 extends Solution implements SolutionInterface
{
    public function run(): string
    {
        $generator = new PasswordGenerator($this->getInput(true));
        foreach ($generator as $password) {
            if (PasswordValidator::isValid($password)) {
                return $password;
            }
        }
    }
}
