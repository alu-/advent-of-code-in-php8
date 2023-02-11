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
        $answer = '';
        foreach (preg_split('/(.)(?!\1|$)\K/', $start) as $match) {
            $answer .= strlen($match) . $match[0];
        }

        return $answer;
    }
}
