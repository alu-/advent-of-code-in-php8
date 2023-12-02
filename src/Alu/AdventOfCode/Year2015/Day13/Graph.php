<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day13;

use Alu\AdventOfCode\Year2015\Day9\Graph as Day9Graph;
use Alu\AdventOfCode\Year2015\Day9\Route;
use Alu\AdventOfCode\Year2015\Day9\Vertex;

class Graph extends Day9Graph
{
    /**
     * Check if edge exists
     * @param string $from
     * @param string $to
     * @return bool
     */
    public function hasEdge(string $from, string $to): bool
    {
        return array_key_exists($from, $this->edges) && array_key_exists($to, $this->edges[$from]);
    }

    /**
     * Get an edge
     * @param string $from
     * @param string $to
     * @return int|float
     */
    public function getEdge(string $from, string $to): int|float
    {
        return $this->edges[$from][$to];
    }

    /**
     * Perform a depth-first search of the graph but connect the last node to the first one if an edge exists
     * https://en.wikipedia.org/wiki/Depth-first_search
     * @param Vertex|null $start
     * @return array<Route>
     */
    public function depthFirstSearchWithCycle(?Vertex $start = null): array
    {
        if (is_null($start)) {
            $start = current($this->vertices);
        }

        $routes = [];
        $dfs = function (Vertex $vertex, int|float $distance = 0, Route $discovered = new Route()) use (&$dfs, &$routes, $start) {
            $discovered->addStop($vertex, $distance);
            $edgesNotVisited = array_filter(
                $this->adjacentEdges($vertex),
                fn ($distance, $vertexName) => !$discovered->hasStop($vertexName),
                ARRAY_FILTER_USE_BOTH
            );

            if (empty($edgesNotVisited)) {
                $edges = $this->adjacentEdges($vertex);
                $discovered->addStop($start, $edges[$start->getName()]);
                $routes[] = $discovered;
            } else {
                foreach ($edgesNotVisited as $directed_edge => $distance) {
                    if (!$discovered->hasStop($directed_edge)) {
                        $dfs($this->vertices[$directed_edge], $distance, clone $discovered);
                    }
                }
            }
        };
        $dfs($start);

        return $routes;
    }
}
