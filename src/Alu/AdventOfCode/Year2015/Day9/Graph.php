<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Year2015\Day9;

use JetBrains\PhpStorm\Pure;

/**
 * Data class to hold information about a graph.
 * https://en.wikipedia.org/wiki/Graph_theory
 */
class Graph
{
    public function __construct(private array $vertices = [], private array $edges = [])
    {
    }

    /**
     * Check if the graph has a vertex.
     * @param string $name
     * @return bool
     */
    public function hasVertex(string $name): bool
    {
        return array_key_exists($name, $this->vertices);
    }

    /**
     * Add a vertex to graph.
     * @param Vertex $vertex
     * @return void
     */
    public function addVertex(Vertex $vertex): void
    {
        $this->vertices[$vertex->getName()] = $vertex;
    }

    /**
     * Get all vertices.
     * @return array
     */
    public function getVertices(): array
    {
        return $this->vertices;
    }

    /**
     * Add a edge between two vertices.
     * @param string $from
     * @param string $to
     * @param int|float $distance
     * @param bool $directed Edge links two vertices symmetrically
     * @return void
     */
    public function addEdge(string $from, string $to, int|float $distance, bool $directed = true): void
    {
        $this->edges[$from][$to] = $distance;
        if (!$directed) {
            $this->edges[$to][$from] = $distance;
        }
    }

    /**
     * Get all edges in graph.
     * @return array
     */
    public function getEdges(): array
    {
        return $this->edges;
    }


    /**
     * Return all edges adjacent to vertex.
     * @param Vertex $vertex
     * @return array
     */
    #[Pure] public function adjacentEdges(Vertex $vertex): array
    {
        return $this->edges[$vertex->getName()];
    }

    /**
     * Perform a depth-first search of the graph.
     * https://en.wikipedia.org/wiki/Depth-first_search
     * @param Vertex|null $start
     * @return array<Route>
     */
    public function depthFirstSearch(?Vertex $start = null): array
    {
        if (is_null($start)) {
            $start = current($this->vertices);
        }

        $routes = [];
        $dfs = function (Vertex $vertex, int|float $distance = 0, Route $discovered = new Route()) use (&$dfs, &$routes) {
            $discovered->addStop($vertex, $distance);
            $edgesNotVisited = array_filter(
                $this->adjacentEdges($vertex),
                fn ($distance, $vertexName) => !$discovered->hasStop($vertexName),
                ARRAY_FILTER_USE_BOTH
            );

            if (empty($edgesNotVisited)) {
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
