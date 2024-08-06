<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day7;

class Part2 extends Part1
{
    public function run(): int
    {
        $a = parent::run();
        $this->memory = [];

        $instructions = array_map([$this, 'parseInstruction'], $this->getInputLines());
        foreach ($instructions as $key => $instruction) {
            if ($instruction['output'] == 'b') {
                $instructions[$key] = [
                    'operation' => '',
                    'left' => '',
                    'right' => $a,
                    'output' => 'b'
                ];
            }
        }

        $this->runInstructions($instructions);

        return $this->readMemoryAtAddress('a');
    }
}
