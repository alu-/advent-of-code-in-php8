<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day10;

use Alu\AdventOfCode\Helpers\{Solution, SolutionInterface};

class Part1 extends Solution implements SolutionInterface
{
    public function run(): int
    {
        $start = $this->getInput(true);
        for($i = 0; $i < 40; $i++) {
            $start = $this->lookAndSay($start);
        }

        return strlen($start);
    }

    public function lookAndSay(string $start): string
    {
        return preg_replace_callback('/(.)\1*/', fn ($match)  => strlen($match[0]) . $match[0][0], $start);
    }
}
