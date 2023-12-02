<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day12;

use FilterIterator;

/**
 * A filter iterator that only accepts integer values.
 */
class IntegerFilterIterator extends FilterIterator
{
    public function accept(): bool
    {
        return is_int($this->current());
    }
}
