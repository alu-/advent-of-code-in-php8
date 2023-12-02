<?php

namespace Tests\Alu\AdventOfCode\Year2015\Day14\Race;

use Alu\AdventOfCode\Year2015\Day14\Race\Manager;
use Alu\AdventOfCode\Year2015\Day14\Race\Reindeer;
use PHPUnit\Framework\TestCase;

class ManagerTest extends TestCase
{
    public function testAdvance()
    {
        $reindeer = new Reindeer('Testdeer', 1, 2,10);
        $race = new Manager([$reindeer]);

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
        $race = new Manager([$loser, $winner]);

        $race->advance();
        $this->assertSame($winner, $race->winner());
    }
}
