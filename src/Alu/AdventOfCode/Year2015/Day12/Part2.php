<?php

namespace Alu\AdventOfCode\Year2015\Day12;

use Alu\AdventOfCode\Helpers\{Solution, SolutionInterface};

class Part2 extends Solution implements SolutionInterface
{
    public function run(): int
    {
        $root = json_decode($this->getInput());
        $answer = $this->recurseStructure($root);

        return $answer;
    }

    private function recurseStructure(array|object $node, int $answer = 0): int
    {
        if (is_object($node)) {
            if (!$this->isRed($node)) {
                $answer = $this->recurseStructure(get_object_vars($node), $answer);
            }
        } else {
            foreach ($node as &$item) {
                if (is_object($item)) {
                    if (!$this->isRed($item)) {
                        $answer = $this->recurseStructure($item, $answer);
                    }
                } elseif (is_array($item)) {
                    $answer = $this->recurseStructure($item, $answer);
                } elseif (is_int($item)) {
                    // number
                    $answer += $item;
                }
            }
        }

        return $answer;
    }

    private function isRed(object $item): bool
    {
        return in_array("red", get_object_vars($item), true);
    }
}
