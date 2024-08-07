<?php
declare(strict_types=1);

namespace Tests\Alu\AdventOfCode\Year2015\Day9;

use Alu\AdventOfCode\Year2015\Day9\Part1;
use PHPUnit\Framework\TestCase;

class Part1Test extends TestCase
{
    /**
     * @dataProvider inputProvider
     */
    public function testRun($input, $output)
    {
        $solution = new Part1();
        $solution->setInput($input);

        $this->assertSame($output, $solution->run());
    }

    public function inputProvider(): array
    {
        // London -> Dublin -> Belfast = 605
        return [
            [<<<'EOD'
London to Dublin = 464
London to Belfast = 518
Dublin to Belfast = 141
EOD, 605],
        ];
    }
}
