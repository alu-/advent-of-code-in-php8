<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2022\Day4;

use JetBrains\PhpStorm\Pure;

class Section
{
    public function __construct(
        private readonly int $start,
        private readonly int $stop
    ) {
    }

    /**
     * @return int
     */
    private function getStart(): int
    {
        return $this->start;
    }

    /**
     * @return int
     */
    private function getStop(): int
    {
        return $this->stop;
    }

    #[Pure]
    public function containsSection(Section $otherSection): bool
    {
        return $otherSection->getStart() >= $this->getStart() && $otherSection->getStop() <= $this->getStop();
    }
}
