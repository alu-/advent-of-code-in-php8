<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Helpers;

use Generator;

/**
 * Return all unique unordered pair combinations from an array.
 *
 * @param array $arr
 * @return Generator
 */
function pairs(array $arr): Generator
{
    $len = count($arr);
    for ($i = 0; $i < $len - 1; $i++) {
        for ($j = $i + 1; $j < $len; $j++) {
            yield [$arr[$i], $arr[$j]];
        }
    }
}
