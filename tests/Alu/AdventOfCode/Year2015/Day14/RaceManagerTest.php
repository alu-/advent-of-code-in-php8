<?php

namespace Tests\Alu\AdventOfCode\Year2015\Day14;

use Alu\AdventOfCode\Year2015\Day14\Part1;
use Alu\AdventOfCode\Year2015\Day14\RaceManager;
use Alu\AdventOfCode\Year2015\Day14\Reindeer;
use PHPUnit\Framework\TestCase;

class RaceManagerTest extends TestCase
{
    public function testAdvance()
    {
        $reindeer = new Reindeer('Testdeer', 1, 2,10);
        $race = new RaceManager([$reindeer]);

        $race->advance();
        $this->assertSame(1, $reindeer->getDistanceTravelled());
        $this->assertFalse($reindeer->isResting());

        $race->advance();
        $this->assertSame(2, $reindeer->getDistanceTravelled());
        $this->assertTrue($reindeer->isResting());

        for ($i = 0; $i < 9; $i++) {
            $race->advance();
            $this->assertSame(2, $reindeer->getDistanceTravelled());
            $this->assertTrue($reindeer->isResting());
        }

        $race->advance();
        $this->assertSame(2, $reindeer->getDistanceTravelled());
        $this->assertFalse($reindeer->isResting());

        $race->advance();
        $this->assertSame(3, $reindeer->getDistanceTravelled());
        $this->assertFalse($reindeer->isResting());
    }

    public function testWinner()
    {
        $loser = new Reindeer('Loser', 1, 2,10);
        $winner = new Reindeer('Winner', 1000, 2,10);
        $race = new RaceManager([$loser, $winner]);

        $race->advance();
        $this->assertSame($winner, $race->winner());
    }
}
