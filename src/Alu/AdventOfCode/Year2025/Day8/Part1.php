<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2025\Day8;

use Alu\AdventOfCode\Helpers\ArgumentDefinition;
use Alu\AdventOfCode\Helpers\ArgumentsTrait;
use Alu\AdventOfCode\Helpers\Solution;
use Alu\AdventOfCode\Helpers\Type;

class Part1 extends Solution
{
    use ArgumentsTrait;

    protected $dsu;
    protected $heap;
    protected $junctions;

    public function __construct()
    {
        parent::__construct();

        $this->setDefinition([
            new ArgumentDefinition('connections', 'Amount of connections to make', Type::INT, 1000),
        ]);

        $this->dsu = new DisjointSet();
        $this->heap = new DistanceHeap();
    }

    public function run(): int
    {
        $junctions = $this->parseJunctions();
        $junctionCount = count($junctions);
        for ($a = 0; $a < $junctionCount; $a++) {
            $this->dsu->add($junctions[$a]);

            for ($b = $a + 1; $b < $junctionCount; $b++) {
                $this->heap->insert(new Distance(
                    (int) self::squaredDistance($junctions[$a], $junctions[$b]),
                    $junctions[$a],
                    $junctions[$b],
                ));
            }
        }

        $n = $this->getArgument('connections');
        for ($i = 0; $i < $n; $i++) {
            $top = $this->heap->extract();
            $this->dsu->union($top->a, $top->b);
        }

        $sizes = $this->dsu->size;
        rsort($sizes);

        return array_product(array_slice($sizes, 0, 3));
    }

    /**
     * Calculate the squared Euclidean distance between two junctions
     */
    protected static function squaredDistance(Junction $first, Junction $second): float
    {
        return ($first->x - $second->x) ** 2
            + ($first->y - $second->y) ** 2
            + ($first->z - $second->z) ** 2;
    }

    /**
     * @return Junction[]
     */
    protected function parseJunctions(): array
    {
        return $this->getInputLines(true)
                |> (fn($line) => array_map(fn($line) => explode(',', $line), $line))
                |> (fn($rows) => array_map(fn($row) => array_map('intval', $row), $rows))
                |> (fn($rows) => array_map(
                    fn(array $coords, int $id) => new Junction($id, ...$coords),
                    $rows,
                    array_keys($rows)
                ));
    }
}
