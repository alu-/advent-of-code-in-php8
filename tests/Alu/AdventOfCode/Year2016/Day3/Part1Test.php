<?php
declare(strict_types = 1);

namespace Tests\Alu\AdventOfCode\Year2016\Day3;

use Alu\AdventOfCode\Year2016\Day3\Part1;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\Alu\AdventOfCode\TestCase;

class Part1Test extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testRun($input, $output)
    {
        /** @var Part1 $solution */
        $solution = $this->getMockForPart(Part1::class);
        $solution->setInput($input);

        $this->assertSame($output, $solution->run());
    }

    public static function inputProvider(): array
    {


        return [
            [<<<'EOD'
  496  369  792
  677  412  833
   95  316  802
  957  774  647
  966  842  861
  233  737  194
  260  605  424
EOD, 5],
        ];
    }
}
