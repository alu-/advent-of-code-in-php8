<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Helpers;

use InvalidArgumentException;

/**
 * Provides support for named, typed runtime arguments for Advent of Code solutions.
 *
 * This trait is intended for edge cases where a solution needs configurable input
 * beyond the puzzle input itself, such as:
 * - Running the same solution logic with alternative parameters
 * - Supporting test scenarios with values differing from the actual puzzle
 * - Toggling optional behaviors without branching the solution code
 *
 * Arguments must be explicitly defined via {@see setDefinition()} before being set
 * or accessed. Each argument is validated against its {@see ArgumentDefinition}
 * to ensure type safety and correctness at runtime.
 *
 * Typical usage flow:
 * 1. Define allowed arguments and their types using ArgumentDefinition objects
 * 2. Call {@see setDefinition()} once during initialization
 * 3. Set argument values via {@see setArgument()}
 * 4. Retrieve values via {@see getArgument()}
 *
 * @see https://adventofcode.com/2025/day/8
 */
trait ArgumentsTrait
{
    private array $arguments = [];
    private array $definition = [];

    public function getArgument(string $name): mixed
    {
        return $this->arguments[$name]
            ?? $this->definition[$name]->default
            ?? throw new InvalidArgumentException(sprintf('Argument %s does not exist.', $name));
    }

    public function setArgument(string $name, mixed $value): void
    {
        $this->validateArgument($name, $value);
        $this->arguments[$name] = $value;
    }

    /**
     * @param array<int, ArgumentDefinition> $definition
     * @return void
     */
    public function setDefinition(array $definition): void
    {
        foreach ($definition as $argumentDefinition) {
            $this->definition[$argumentDefinition->name] = $argumentDefinition;
        }
    }

    private function validateArgument(string $name, mixed $value): bool
    {
        $definition = $this->definition[$name]
            ?? throw new InvalidArgumentException(sprintf('Argument %s does not exist.', $name));

        return $definition->type->validate($value);
    }
}
