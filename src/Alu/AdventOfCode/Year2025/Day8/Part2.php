<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2025\Day8;

class Part2 extends Part1
{
    public function run(): int
    {
        $junctions = $this->parseJunctions();
        $junctionCount = count($junctions);
        for ($a = 0; $a < $junctionCount; $a++) {
            $this->dsu->add($junctions[$a]);

            for ($b = $a + 1; $b < $junctionCount; $b++) {
                $this->heap->insert(new Distance(
                    (int) self::squaredDistance($junctions[$a], $junctions[$b]),
                    $junctions[$a],
                    $junctions[$b],
                ));
            }
        }

        foreach ($this->heap as $top) {
            if ($this->dsu->union($top->a, $top->b)) {
                $last = $top;
            }
        }

        return $last->a->x * $last->b->x;
    }
}
