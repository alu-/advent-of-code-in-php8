<?php

namespace Alu\AdventOfCode\Year2022\Day7;

class Command
{
    private string $name;
    private array $arguments;
    private array $output = [];

    /**
     * @param string $line
     */
    public function __construct(string $line)
    {
        $words = explode(' ', $line);
        $this->name = $words[1];
        $this->arguments = array_slice($words, 2);
    }

    public function __toString(): string
    {
        $output = sprintf("$ %s", $this->name);
        if (!empty($this->arguments)) {
            $output .= sprintf(" %s", implode(" ", $this->arguments));
        }
        $output .= "\n";

        if (!empty($this->output)) {
            $output .= implode("\n", $this->output) . "\n";
        }

        return $output;
    }

    /**
     * @return array
     */
    public function getOutput(): array
    {
        return $this->output;
    }

    /**
     * @param array $output
     */
    public function setOutput(array $output): void
    {
        $this->output = $output;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array|string[]
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }
}
