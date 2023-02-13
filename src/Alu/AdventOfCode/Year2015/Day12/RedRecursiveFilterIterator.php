<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day12;

use RecursiveFilterIterator;

class RedRecursiveFilterIterator extends RecursiveFilterIterator
{
    public function accept(): bool
    {
        if (is_object($this->current())){
            return !in_array('red', get_object_vars($this->current()));
        } else {
            return true;
        }
    }
}
