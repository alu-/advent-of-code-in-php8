<?php

namespace Alu\AdventOfCode\Helpers\Runner\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RunnerCommand extends Command
{
    protected static $defaultName = 'aoc:run';

    /**
     * Configure our runner
     */
    protected function configure(): void
    {
        $this
            ->setDescription('Run a advent or a puzzle.')
            ->setHelp('This command allows you to run an individual puzzle or a whole advent.')
            ->addArgument('year', InputArgument::OPTIONAL, 'Year to run.')
            ->addArgument('day', InputArgument::OPTIONAL, 'Day to run.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $year = $input->getArgument('year');
        $day = $input->getArgument('day');

        if ($year) {
            if ($day) {
                return $this->runDay($output, $day, $year);
            } else {
                return $this->runYear($output, $year);
            }
        }

        return Command::FAILURE;
    }

    private function runDay(OutputInterface $output, int $day, int $year): int
    {
        for ($part = 1; $part <= 2; $part++) {
            $class = $this->formatClassNamespace($year, $day, $part);
            if (class_exists($class)) {
                $solution = new $class;
                $output->writeln(sprintf('Year: %s Day: %s Part: %s Answer: %s', $year, $day, $part, $solution->run()));
            } else {
                $output->writeln(sprintf('Part %s not found, not running ..', $part));
            }
        }

        return Command::SUCCESS;
    }

    private function runYear(OutputInterface $output, int $year): int
    {
        for ($day = 1; $day <= 25; $day++) {
            $this->runDay($output, $day, $year);
        }

        return Command::SUCCESS;
    }

    private function formatClassNamespace(int $year, int $day, int $part): string
    {
        return '\\Alu\\AdventOfCode\\Year' . $year . '\\Day' . $day . '\\Part' . $part;
    }
}
