<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2016\Day2;

use Alu\AdventOfCode\Helpers\Solution;

class Part2 extends Solution
{
    public function run(): string
    {
        $instructions = $this->getInputLines(true)
            |> (fn($rows) => array_map(fn($row) => array_map(fn($a) => Direction::from($a), str_split($row)), $rows));

        $adjacency = [
            '1' => [Direction::DOWN->value => '3'],
            '2' => [Direction::RIGHT->value => '3'],
            '3' => [
                Direction::UP->value => '1',
                Direction::RIGHT->value => '4',
                Direction::DOWN->value => '7',
                Direction::LEFT->value => '2'
            ],
            '4' => [Direction::DOWN->value => '8', Direction::LEFT->value => '3'],
            '5' => [Direction::RIGHT->value => '6'],
            '6' => [
                Direction::UP->value => '2',
                Direction::RIGHT->value => '7',
                Direction::DOWN->value => 'A',
                Direction::LEFT->value => '5'
            ],
            '7' => [
                Direction::UP->value => '3',
                Direction::RIGHT->value => '8',
                Direction::DOWN->value => 'B',
                Direction::LEFT->value => '6'
            ],
            '8' => [
                Direction::UP->value => '4',
                Direction::RIGHT->value => '9',
                Direction::DOWN->value => 'C',
                Direction::LEFT->value => '7'
            ],
            '9' => [Direction::LEFT->value => '8'],
            'A' => [Direction::UP->value => '6', Direction::RIGHT->value => 'B'],
            'B' => [
                Direction::UP->value => '7',
                Direction::RIGHT->value => 'C',
                Direction::DOWN->value => 'D',
                Direction::LEFT->value => 'A'
            ],
            'C' => [Direction::UP->value => '8', Direction::LEFT->value => 'B'],
            'D' => [Direction::UP->value => 'B'],
        ];
        $position = '5';
        $code = '';
        foreach ($instructions as $directions) {
            foreach ($directions as $direction) {
                $position = $adjacency[$position][$direction->value] ?? $position;
            }

            $code .= $position;
        }

        return $code;
    }
}
