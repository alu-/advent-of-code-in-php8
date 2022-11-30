<?php

namespace Alu\AdventOfCode\Helpers\Runner\Command;

use Generator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;

class RunnerCommand extends Command
{
    protected static $defaultName = 'aoc:run';

    /**
     * @param $matches
     * @param OutputInterface $output
     * @return int
     */
    public function runAll(OutputInterface $output): int
    {
        foreach ($this->getSolutions() as $solution) {
            /** @var string $solution */
            preg_match(
                '/^.*Alu\/AdventOfCode\/Year(?P<year>\d*)\/Day(?P<day>\d*)\/Part\d*.php$/',
                $solution,
                $matches
            );

            if (!empty($matches['year']) && !empty($matches['day'])) {
                $this->runDay($output, $matches['day'], $matches['year']);
            }

        }

        return Command::SUCCESS;
    }

    /**
     * Configure our runner
     */
    protected function configure(): void
    {
        $this
            ->setDescription('Run a advent or a puzzle.')
            ->setHelp('This command allows you to run an individual puzzle or a whole advent.')
            ->addArgument('year',  description: 'Year to run.')
            ->addArgument('day',  description: 'Day to run.')
            ->addOption('all', description: 'Run all solutions');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if ($input->getOption('all')) {
            return $this->runAll($output);
        } else {
            $year = $input->getArgument('year');
            $day = $input->getArgument('day');

            if ($year) {
                if ($day) {
                    return $this->runDay($output, $day, $year);
                } else {
                    return $this->runYear($output, $year);
                }
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
                $output->writeln(sprintf("Year: %d Day: %d Part: %d Answer: %d", $year, $day, $part, $solution->run()));
            } else {
                $output->writeln(sprintf("Part %d not found for year %d day %d, not running ..", $part, $year, $day));
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

    /**
     * @return Generator
     */
    private function getSolutions(): Generator
    {
        $finder = (new Finder())
            ->files()
            ->in(realpath(__DIR__ . '/../../..') . '/Year*/Day*/')
            ->name('*.php')
            ->sortByName(true);

        foreach($finder as $path => $fileInfo) {
            yield $path;
        }
    }
}
