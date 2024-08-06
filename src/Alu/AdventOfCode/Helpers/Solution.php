<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Helpers;

use ReflectionClass;

abstract class Solution implements SolutionInterface
{
    private string $input;

    public function __construct()
    {
        $this->setInput($this->readInputFromFile());
    }

    /**
     * Reads the puzzle input from file
     * @return string
     */
    protected function readInputFromFile(): string
    {
        $reflector = new ReflectionClass(get_class($this));

        return file_get_contents(dirname($reflector->getFileName()) . '/input.txt');
    }

    /**
     * Getter for puzzle input
     * @return string
     */
    public function getInput(bool $trim = false): string
    {
        return $trim ? trim($this->input) : $this->input;
    }

    /**
     * Setter for puzzle input
     * @param string $input
     */
    public function setInput(string $input): void
    {
        $this->input = $input;
    }

    /**
     * Return the input as an array, split by lines
     * @todo Convert into a generator to save memory
     * @param bool $trim
     * @return string[]
     */
    protected function getInputLines(bool $trim = false): array
    {
        $input = $trim ? trim($this->getInput()) : $this->getInput();

        return explode("\n", $input);
    }
}
