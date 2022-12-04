<?php

namespace Tests\Alu\AdventOfCode\Year2022;

use PHPUnit\Framework\TestCase;

/**
 * These tests verify that the answers from the solutions, given a valid input.txt, is what the website says should be
 * correct.
 */
class Year2022 extends TestCase
{
    public function testDay1()
    {
        $this->assertSame(69912, (new \Alu\AdventOfCode\Year2022\Day1\Part1)->run());
        $this->assertSame(208180, (new \Alu\AdventOfCode\Year2022\Day1\Part2)->run());
    }

    public function testDay2()
    {
        $this->assertSame(13446, (new \Alu\AdventOfCode\Year2022\Day2\Part1)->run());
        $this->assertSame(13509, (new \Alu\AdventOfCode\Year2022\Day2\Part2)->run());
    }

    public function testDay3()
    {
        $this->assertSame(7817, (new \Alu\AdventOfCode\Year2022\Day3\Part1)->run());
        $this->assertSame(2444, (new \Alu\AdventOfCode\Year2022\Day3\Part2)->run());
    }

    public function testDay4()
    {
        $this->assertSame(562, (new \Alu\AdventOfCode\Year2022\Day4\Part1)->run());
        $this->assertSame(924, (new \Alu\AdventOfCode\Year2022\Day4\Part2)->run());
    }
}
