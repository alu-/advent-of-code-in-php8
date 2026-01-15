<?php

namespace Alu\AdventOfCode\Year2025\Day7;

enum CellType: string
{
    case Empty = '.';
    case Start = 'S';
    case Splitter = '^';
}
