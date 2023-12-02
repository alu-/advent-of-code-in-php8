<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day14\Race\Contracts;

use Alu\AdventOfCode\Year2015\Day14\Race\Reindeer;

interface RaceInterface
{
    public function advance(): void;
    public function winner(): Reindeer;
}
