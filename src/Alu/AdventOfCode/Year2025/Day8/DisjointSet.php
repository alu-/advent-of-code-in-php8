<?php

namespace Alu\AdventOfCode\Year2025\Day8;

use InvalidArgumentException;

/**
 * Disjoint-set
 * @see https://en.wikipedia.org/wiki/Disjoint-set_data_structure
 */
class DisjointSet
{
    public array $parent = [];
    public array $size = [];

    public function add(Junction $v): void
    {
        if (!array_key_exists($v->id, $this->parent)) {
            $this->parent[$v->id] = $v->id;
            $this->size[$v->id] = 1;
        }
    }

    public function find(int $v): int
    {
        if (!array_key_exists($v, $this->parent)) {
            throw new InvalidArgumentException("Junction does not exist in Disjoint-set.");
        }

        if ($this->parent[$v] !== $v) {
            $this->parent[$v] = $this->find($this->parent[$v]);
        }

        return $this->parent[$v];
    }

    public function union(Junction $a, Junction $b): bool
    {
        $a = self::find($a->id);
        $b = self::find($b->id);
        if ($a === $b) {
            return false;
        }

        if ($this->size[$a] < $this->size[$b]) {
            $this->parent[$a] = $b;
            $this->size[$b] += $this->size[$a];
        } else {
            $this->parent[$b] = $a;
            $this->size[$a] += $this->size[$b];
        }

        return true;
    }
}
