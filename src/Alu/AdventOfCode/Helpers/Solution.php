<?php

namespace Alu\AdventOfCode\Helpers;

use ReflectionClass;

abstract class Solution
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
    public function getInput(): string
    {
        return $this->input;
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
     * @param bool $trim
     * @return string[]
     * @todo Convert into a generator to save memory
     */
    protected function getInputLines(bool $trim = false): array
    {
        $input = $trim ? trim($this->getInput()) : $this->getInput();

        return explode("\n", $input);
    }
}
