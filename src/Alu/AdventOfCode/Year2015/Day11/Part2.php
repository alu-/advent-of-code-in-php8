<?php

namespace Alu\AdventOfCode\Year2015\Day11;

class Part2 extends Part1
{
    public function run(): string
    {
        $password = parent::run();
        $this->setInput(str_increment($password));

        return parent::run();
    }
}
