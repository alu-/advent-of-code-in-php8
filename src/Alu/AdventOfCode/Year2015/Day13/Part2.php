<?php

namespace Alu\AdventOfCode\Year2015\Day13;

use Alu\AdventOfCode\Year2015\Day9\Vertex;

class Part2 extends Part1
{
    public function run(): int
    {
        $graph = new Graph();
        $graph->addVertex(new Vertex("Me"));
        foreach($this->getInputLines(true) as $line) {
            preg_match('/(\w+) would (gain|lose) (\d+) happiness units by sitting next to (\w+)/', $line, $matches);
            list(, $left, $modifier, $weight, $right) = $matches;

            $this->addVertex($graph, $left)
                ->addVertex($graph, $right);

            $weight = match($modifier) {
                'gain' => $weight,
                'lose' => -$weight,
            };

            if ($graph->hasEdge($right, $left)) {
                $normalizedWeight = $graph->getEdge($right, $left) + $weight;
                $graph->addEdge($left, $right, $normalizedWeight, false);
            } else {
                $graph->addEdge($left, $right, $weight);
            }

            $graph->addEdge($left, "Me", 0, false);
        }

        $dfs = $graph->depthFirstSearchWithCycle();
        $happiness = -INF;
        foreach ($dfs as $route) {
            $happiness = max($happiness, $route->getDistance());
        }

        return $happiness;
    }
}
