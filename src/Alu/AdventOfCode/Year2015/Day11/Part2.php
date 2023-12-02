<?php

namespace Alu\AdventOfCode\Year2015\Day11;

class Part2 extends Part1
{
    public function run(): string
    {
        $password = parent::run();
        $this->setInput(++$password);

        return parent::run();
    }
}
