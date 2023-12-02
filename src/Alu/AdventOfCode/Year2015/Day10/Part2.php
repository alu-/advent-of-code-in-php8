<?php
namespace Alu\AdventOfCode\Year2015\Day10;

class Part2 extends Part1
{
    public function run(): int
    {
        $start = $this->getInput(true);
        for ($i = 0; $i < 50; $i++) {
            $start = $this->lookAndSay($start);
        }

        return strlen($start);
    }
}
