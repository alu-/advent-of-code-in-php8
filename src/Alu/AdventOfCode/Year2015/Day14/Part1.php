<?php

namespace Alu\AdventOfCode\Year2015\Day14;

use Alu\AdventOfCode\Helpers\{Solution, SolutionInterface};
use Alu\AdventOfCode\Year2015\Day14\Race\Manager;
use Alu\AdventOfCode\Year2015\Day14\Race\Reindeer;

class Part1 extends Solution implements SolutionInterface
{
    public int $raceDuration = 2503;

    /**
     * @param int $raceDuration
     */
    public function setRaceDuration(int $raceDuration): void
    {
        $this->raceDuration = $raceDuration;
    }

    /**
     * @return int
     */
    public function run(): int
    {
        $input = $this->getInput();
        $reindeer = $this->parseReindeer($input);
        $race = new Manager($reindeer);

        for ($second = 0; $second != $this->raceDuration; $second++) {
            $race->advance();
        }

        return $race->winner()->getDistanceTravelled();
    }

    /**
     * @param string $input
     * @return array
     */
    private function parseReindeer(string $input): array
    {
        preg_match_all(
            '/(?P<name>\w+) can fly (?P<distance>\d+) km\/s for (?P<duration>\d+) seconds, but then must rest for (?P<restDuration>\d+) seconds\\./',
            $input,
            $reindeerData,
            PREG_SET_ORDER
        );

        return array_map(
            fn($data): Reindeer => new Reindeer($data['name'], $data['distance'], $data['duration'], $data['restDuration']),
            $reindeerData
        );
    }
}
