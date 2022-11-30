<?php

namespace Alu\AdventOfCode\Helpers\Bootstrap\Command;

use DOMDocument;
use DOMXPath;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Exception\GuzzleException;
use League\HTMLToMarkdown\HtmlConverter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class BootstrapCommand extends Command
{
    protected static $defaultName = 'aoc:bootstrap';
    private Client $client;

    public function __construct(string $name = null)
    {
        parent::__construct($name);

        $this->client = new Client(['cookies' => true]);
    }

    /**
     * Configure our bootstrap command
     * @todo Add year and day arguments
     */
    protected function configure(): void
    {
        $this
            ->setDescription('Downloads a puzzle and creates empty solution and test files.')
            ->setHelp('This command allows you to run an individual puzzle or a whole advent.')
            ->addOption('next', null, InputOption::VALUE_NONE, 'Bootstrap the next puzzle');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws GuzzleException
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->loadConfig();
        if (!$this->isConfigured()) {
            $output->write(
                "You need to configure the environment file. Have a look at .env.example",
                true
            );
            return Command::FAILURE;
        }

        if ($input->getOption('next')) {
            $puzzle = $this->getNextPuzzle();
            if (!$puzzle) {
                $output->write("There isn't another puzzle for you to solve.", true);
                return Command::SUCCESS;
            }

            $output->write(vsprintf("Next puzzle is year %s, day %s, part %s ..", $puzzle), true);

            $this->createDirectories($puzzle['year'], $puzzle['day']);
            $this->downloadFiles(...$puzzle);
            $this->createSourceFile(...$puzzle);
            $this->createTestFile(...$puzzle);

            $output->write(
                "Puzzle bootstrapped at " . self::getSolutionPath($puzzle['year'], $puzzle['day']),
                true
            );

            return Command::SUCCESS;
        }

        return Command::FAILURE;
    }

    /**
     * Loads dotenv configuration from .env
     */
    protected function loadConfig(): void
    {
        (new Dotenv())
            ->usePutenv(true)
            ->load(dirname(__DIR__, 6) . '/.env');
    }

    /**
     * Check if all environment variables are present
     * @return bool
     */
    private function isConfigured(): bool
    {
        return !empty(getenv('AOC_TOKEN'));
    }

    /**
     * Figure out which puzzle is next by looking at the filesystem
     * @return array|false
     */
    private function getNextPuzzle(): array|false
    {
        $finder = new Finder();
        $finder
            ->files()
            ->in(dirname(__DIR__, 3) . '/Year*')
            ->name('Part*.php');

        $years = range(2015, (int)date('Y'));
        $days = range(1, 25);

        $files = iterator_to_array($finder);
        foreach ($years as $year) {
            foreach ($days as $day) {
                foreach (range(1, 2) as $part) {
                    $key = sprintf('Year%s/Day%s/Part%s', $year, $day, $part);
                    $matches = array_filter($files, fn($element) => str_contains($element, $key));

                    if (count($matches) == 0) {
                        return [
                            'year' => $year,
                            'day' => $day,
                            'part' => $part
                        ];
                    }
                }
            }
        }

        return false;
    }

    /**
     * Create the solution directory recursively
     * @param int $year
     * @param int $day
     * @throws IOException On any directory creation failure
     */
    private function createDirectories(int $year, int $day): void
    {
        $filesystem = new Filesystem();

        $paths = [self::getSolutionPath($year, $day), self::getTestPath($year, $day)];
        foreach ($paths as $path) {
            if (!$filesystem->exists($path)) {
                $filesystem->mkdir($path);
            }
        }
    }

    /**
     * @throws GuzzleException
     */
    private function downloadFiles(int $year, int $day, int $part): void
    {
        $this->downloadPuzzle($year, $day, $part);
        if ($this->inputIsMissing($year, $day)) {
            $this->downloadInput($year, $day);
        }
    }

    /**
     * @throws GuzzleException
     */
    private function downloadPuzzle(int $year, int $day, int $part): bool|int
    {
        $uri = sprintf("https://adventofcode.com/%s/day/%s", $year, $day);
        $response = $this->client->request("GET", $uri, ['cookies' => $this->getCookieJar()]);
        $html = $response->getBody()->getContents();

        $dom = new DOMDocument();
        $dom->loadHTML($html, LIBXML_NOERROR);

        $xpath = new DOMXpath($dom);
        $puzzle = $xpath->query("/html/body/main/article[" . $part . "]");
        $html = $dom->saveHTML($puzzle[0]);

        $converter = new HtmlConverter(['strip_tags' => true]);
        $markdown = $converter->convert($html);

        $path = sprintf("%s/part%s.md", self::getSolutionPath($year, $day), $part);

        return file_put_contents($path, $markdown);
    }

    private function getCookieJar(): CookieJar
    {
        return CookieJar::fromArray([
            'session' => getenv('AOC_TOKEN')
        ], "adventofcode.com");
    }

    /**
     * Check if the solution has an input stored in the filesystem
     * @param int $year
     * @param int $day
     * @return bool
     */
    private function inputIsMissing(int $year, int $day): bool
    {
        return !file_exists(self::getSolutionPath($year, $day) . '/input.txt');
    }

    /**
     * @throws GuzzleException
     */
    private function downloadInput(int $year, int $day)
    {
        $uri = sprintf("https://adventofcode.com/%s/day/%s/input", $year, $day);
        $this->client->request('GET', $uri, [
            'cookies' => $this->getCookieJar(),
            'sink' => self::getSolutionPath($year, $day) . '/input.txt'
        ]);
    }

    /**
     * @param int $year
     * @param int $day
     * @return string
     */
    private static function getSolutionPath(int $year, int $day): string
    {
        return sprintf('%s/Year%s/Day%s', dirname(__DIR__, 3), $year, $day);
    }

    /**
     * @param int $year
     * @param int $day
     * @return string
     */
    private static function getTestPath(int $year, int $day): string
    {
        return sprintf('%s/tests/Alu/AdventOfCode/Year%s/Day%s', dirname(__DIR__, 6), $year, $day);
    }

    /**
     * Create a solution php-file in the solution path
     * @param int $year
     * @param int $day
     * @param int $part
     * @return bool|int
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    private function createSourceFile(int $year, int $day, int $part): bool|int
    {
        $loader = new FilesystemLoader(dirname(__DIR__) . '/templates/');
        $twig = new Environment($loader, ['cache' => false]);
        $solution = $twig->render('solution.php.twig', [
            'year' => $year,
            'day' => $day,
            'part' => $part
        ]);

        $filename = sprintf("%s/Part%s.php", self::getSolutionPath($year, $day), $part);

        return file_put_contents($filename, $solution);
    }

    /**
     * Create a phpunit test file
     * @param int $year
     * @param int $day
     * @param int $part
     * @return bool|int
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    private function createTestFile(int $year, int $day, int $part): bool|int
    {
        $loader = new FilesystemLoader(dirname(__DIR__) . '/templates/');
        $twig = new Environment($loader, ['cache' => false]);
        $solution = $twig->render('test.php.twig', [
            'year' => $year,
            'day' => $day,
            'part' => $part
        ]);

        $filename = sprintf("%s/Part%sTest.php", self::getTestPath($year, $day), $part);

        return file_put_contents($filename, $solution);
    }
}
