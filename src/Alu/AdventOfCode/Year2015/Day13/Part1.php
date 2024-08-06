<?php

namespace Alu\AdventOfCode\Year2015\Day13;

use Alu\AdventOfCode\Year2015\Day9\Vertex;
use Alu\AdventOfCode\Helpers\{Solution, SolutionInterface};

class Part1 extends Solution implements SolutionInterface
{
    public function run(): int
    {
        $graph = new Graph();
        foreach ($this->getInputLines(true) as $line) {
            preg_match('/(\w+) would (gain|lose) (\d+) happiness units by sitting next to (\w+)/', $line, $matches);
            list(, $left, $modifier, $weight, $right) = $matches;

            $this->addVertex($graph, $left)
                ->addVertex($graph, $right);

            $weight = match ($modifier) {
                'gain' => $weight,
                'lose' => -$weight,
            };

            if ($graph->hasEdge($right, $left)) {
                $normalizedWeight = $graph->getEdge($right, $left) + $weight;
                $graph->addEdge($left, $right, $normalizedWeight, false);
            } else {
                $graph->addEdge($left, $right, $weight, true);
            }
        }

        $dfs = $graph->depthFirstSearchWithCycle();
        $happiness = -INF;
        foreach ($dfs as $route) {
            $happiness = max($happiness, $route->getDistance());
        }

        return $happiness;
    }

    /**
     * @param Graph $graph
     * @param string $name
     * @return Part1
     */
    public function addVertex(Graph $graph, string $name): self
    {
        if (!$graph->hasVertex($name)) {
            $graph->addVertex(new Vertex($name));
        }

        return $this;
    }
}
