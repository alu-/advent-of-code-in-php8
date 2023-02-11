<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day9;

use Alu\AdventOfCode\Helpers\{Solution, SolutionInterface};

class Part1 extends Solution implements SolutionInterface
{
    public function run(): int
    {
        return min($this->getDistances());
    }

    /**
     * @return array
     */
    protected function getDistances(): array
    {
        $graph = new Graph();
        foreach ($this->getInputLines(true) as $line) {
            list($from, $to, $distance) = explode('/', str_replace([' to ', ' = '], '/', $line));

            if (!$graph->hasVertex($from)) {
                $graph->addVertex(new Vertex($from));
            }
            if (!$graph->hasVertex($to)) {
                $graph->addVertex(new Vertex($to));
            }

            $graph->addEdge($from, $to, (int)$distance, false);
        }

        $distances = [];
        foreach ($graph->getVertices() as $vertex) {
            $routes = $graph->depthFirstSearch($vertex);
            $distances = [...array_map(fn($r) => $r->getDistance(), $routes), ...$distances];
        }

        return $distances;
    }
}
