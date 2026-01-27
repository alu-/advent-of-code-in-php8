<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2016\Day4;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): int
    {
        preg_match_all(
            '/^([a-z-]*)(\d*)\[([a-z]*)\]$/m',
            $this->getInput(),
            $matches,
            PREG_SET_ORDER
        );

        return $matches
                |> (fn($rooms) => array_filter($rooms, fn(array $room) => self::isValidRoomName($room[1], $room[3])))
                |> (fn($rooms) => array_column($rooms, 2))
                |> array_sum(...);
    }

    protected static function isValidRoomName(string $name, string $checksum): bool
    {
        $checksumParts = str_split($checksum);
        $letters = count_chars(str_replace('-', '', $name), 1);
        uksort($letters, function ($a, $b) use ($letters) {
            $av = $letters[$a];
            $bv = $letters[$b];

            if ($av !== $bv) {
                return $bv <=> $av;
            }

            return $a <=> $b;
        });

        foreach ($checksumParts as $checksum) {
            if (chr(key($letters)) !== $checksum) {
                return false;
            }
            next($letters);
        }

        return true;
    }
}
