<?php

namespace Alu\AdventOfCode\Year2015\Day7;

use Alu\AdventOfCode\Helpers\Solution;

/**
 * Class Part1
 * @package Alu\AdventOfCode\Year2015\Day7
 *
 * I wanted to use Parle (https://www.php.net/manual/en/intro.parle.php) for this but since it is a
 * PECL extension and not bundled with PHP I opted out and went with just regular expressions instead.
 */
class Part1 extends Solution
{
    protected array $memory = [];

    /**
     * @return int
     */
    public function run(): int
    {
        $instructions = array_map([$this, 'parseInstruction'], $this->getInputLines());
        $this->runInstructions($instructions);

        return $this->readMemoryAtAddress('a');
    }

    protected function runInstructions(array &$instructions): void
    {
        while (!empty($instructions)) {
            foreach ($instructions as $key => $instruction) {
                if ($this->canRunInstruction($instruction)) {
                    $left = $this->readMemoryOrUseValue($instruction['left']);
                    $right = $this->readMemoryOrUseValue($instruction['right']);

                    $this->writeMemoryAtAddress($instruction['output'], match ($instruction['operation']) {
                        ''       => $right,
                        'AND'    => $left & $right,
                        'OR'     => $left | $right,
                        'LSHIFT' => $left << $right,
                        'RSHIFT' => $left >> $right,
                        'NOT'    => ~ $right
                    });

                    unset($instructions[$key]);
                }
            }
        }
    }

    /**
     * Use regular expression to parse instruction
     * @param string $line
     * @return array
     */
    protected function parseInstruction(string $line): array
    {
        preg_match(
            '/(?:(?:^(?<operation>NOT) (?<right>[a-z]+))|(?:^(?<left>[a-z0-9]+) (?<operation>AND|OR|[LR]SHIFT) '
            . '(?<right>[a-z0-9]+))|(?:^(?<right>[a-z0-9]+)))(?: -> )(?<output>[a-z]+)$/J',
            $line,
            $matches
        );

        return $matches;
    }

    /**
     * Check if we can run this instruction (e.g is all inputs defined)
     * @param array $instruction
     * @return bool
     */
    protected function canRunInstruction(array $instruction): bool
    {
        $addresses = [];
        if (!empty($instruction['left']) && !is_numeric($instruction['left'])) {
            $addresses[] = $instruction['left'];
        }
        if (!empty($instruction['right']) && !is_numeric($instruction['right'])) {
            $addresses[] = $instruction['right'];
        }

        foreach ($addresses as $address) {
            if (!array_key_exists($address, $this->memory)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Read memory value if provided a memory address, otherwise if numeric use value
     * @param int|string|null $value
     * @return int|null
     */
    protected function readMemoryOrUseValue(int|string|null $value): int|null
    {
        if (is_numeric($value)) {
            return $value;
        } elseif (is_null($value) || $value === '') {
            return null;
        } else {
            return $this->readMemoryAtAddress($value);
        }
    }

    /**
     * Write memory at address to value
     * @param string $address
     * @param int $value
     */
    protected function writeMemoryAtAddress(string $address, int $value): void
    {
        $this->memory[$address] = pack('S', $value);
    }

    /**
     * Read memory at address
     * @param string $address
     * @return int
     */
    protected function readMemoryAtAddress(string $address): int
    {
        return unpack('S', $this->memory[$address])[1];
    }
}
