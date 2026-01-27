<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2016\Day4;

class Part2 extends Part1
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
                |> (fn($rooms) => array_filter($rooms, fn(array $room) => parent::isValidRoomName($room[1], $room[3])))
                |> (fn($rooms) => array_find(
                    $rooms,
                    fn(array $room) => self::rot($room[1], (int) $room[2]) == 'northpole object storage'
                ))
                |> (fn($rooms) => (int)$rooms[2]);
    }

    private function rot(string $string, int $n): string
    {
        $shift = $n % 26;
        $output = '';
        foreach (str_split($string) as $char) {
            if ($char === '-') {
                $output .= " ";
            } else {
                $output .= chr((ord($char) - 97 + $shift) % 26 + 97);
            }
        }

        return trim($output);
    }
}
