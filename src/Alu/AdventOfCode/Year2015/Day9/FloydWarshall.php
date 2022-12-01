<?php

namespace Alu\AdventOfCode\Year2015\Day9;

/**
 * An implementation of the Floyd–Warshall algorithm
 * https://en.wikipedia.org/wiki/Floyd%E2%80%93Warshall_algorithm
 */
class FloydWarshall
{
    private array $graph;
    private array $nodes;
    private array $distances;
    private int $nodeCount;

    public function __construct($graph)
    {
        $this->graph = $graph;
        $this->nodes = array_keys($this->graph);
        $this->nodeCount = count($this->nodes);

        $this->solve();
    }

    public function solve(): void
    {
        foreach ($this->nodes as $outerNode) {
            foreach ($this->nodes as $innerNode) {
                if ($outerNode === $innerNode) {
                    $this->distances[$outerNode][$innerNode] = 0;
                } else if ($this->graph[$outerNode][$innerNode] > 0) {
                    $this->distances[$outerNode][$innerNode] = $this->graph[$outerNode][$innerNode];
                } else {
                    $this->distances[$outerNode][$innerNode] = INF;
                }
            }
        }

        foreach ($this->nodes as $k) {
            foreach ($this->nodes as $i) {
                foreach ($this->nodes as $j) {
                    if ($this->distances[$i][$j] > $this->distances[$i][$k] + $this->distances[$k][$j]) {
                        $this->distances[$i][$j] = $this->distances[$i][$k] + $this->distances[$k][$j];
                    }
                }
            }
        }
    }

    public function getLengthOfShortestPath(): int
    {
        return array_reduce(
            $this->distances,
            fn($carry, $item) => min(array_sum($item), $carry),
            INF
        );
    }

    public function getShortestPath(): array
    {
        return array_reduce(
            $this->distances,
            function ($carry, $item) {
                return array_sum($item) < array_sum($carry) ? $item : $carry;
            },
            [INF]
        );
    }
}
