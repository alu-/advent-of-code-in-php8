<?php

namespace Alu\AdventOfCode\Year2015\Day9;

use Alu\AdventOfCode\Helpers\{Solution, SolutionInterface};

class Part1 extends Solution implements SolutionInterface
{
    public function run(): int
    {
        $graph = [];
        foreach ($this->getInputLines(true) as $line) {
            list($from, $to, $distance) = explode('/', str_replace([' to ', ' = '], '/', $line));

            echo $from . ' - ' . $to . ' : ' . $distance . PHP_EOL;

            $graph[$from][$to] = (int) $distance;
            $graph[$to][$from] = (int) $distance;
        }

        # 8st unika i input, 3 i test
        # 207 live, 605 test
        $floydWarshall = new FloydWarshall($graph);

        var_dump($floydWarshall->getShortestPath());

        return $floydWarshall->getLengthOfShortestPath();
    }

    /*
    Prepping data:
    let dist be a |V| × |V| array of minimum distances initialized to ∞ (infinity)
    for each edge (u, v) do
        dist[u][v] ← w(u, v)  // The weight of the edge (u, v)

    for each vertex v do
        dist[v][v] ← 0

    Solving:
    for k from 1 to |V|
        for i from 1 to |V|
            for j from 1 to |V|
                if dist[i][j] > dist[i][k] + dist[k][j]
                    dist[i][j] ← dist[i][k] + dist[k][j]
                end if
     */
}
