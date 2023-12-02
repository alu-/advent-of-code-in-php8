<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day14;

use Alu\AdventOfCode\Year2015\Day14\Race\PointManager;

class Part2 extends Part1
{
    public function run(): int
    {
        $input = $this->getInput();
        $reindeer = $this->parseReindeer($input);
        $race = new PointManager($reindeer);

        for ($second = 0; $second != $this->raceDuration; $second++) {
            $race->advance();
        }

        return max($race->getPoints());
    }
}
