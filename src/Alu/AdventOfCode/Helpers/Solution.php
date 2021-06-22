<?php

namespace Alu\AdventOfCode\Helpers;

use ReflectionClass;
use ReflectionException;

abstract class Solution
{
    private string $input;

    /**
     * @throws ReflectionException
     */
    public function __construct()
    {
        $this->setInput($this->readInputFromFile());
    }

    /**
     * Reads the puzzle input from file
     * @throws ReflectionException
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
     * @return array
     */
    protected function getInputLines(): array
    {
        return explode("\n", $this->getInput());
    }
}
