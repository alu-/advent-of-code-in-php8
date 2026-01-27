<?php
declare(strict_types = 1);

namespace Tests\Alu\AdventOfCode\Year2016\Day4;

use Alu\AdventOfCode\Year2016\Day4\Part2;
use Tests\Alu\AdventOfCode\TestCase;

class Part2Test extends TestCase
{
    /**
     * @dataProvider inputProvider
     */
    public function testRun($input, $output)
    {
        /** @var Part2 $solution */
        $solution = $this->getMockForPart(Part2::class);
        $solution->setInput($input);

        $this->assertSame($output, $solution->run());
    }

    public static function inputProvider(): array
    {
        return [
            [<<<'EOD'
aaaaa-bbb-z-y-x-123[abxyz]
a-b-c-d-e-f-g-h-987[abcde]
ghkmaihex-hucxvm-lmhktzx-501[hmxka]
totally-real-room-200[decoy]
EOD, 501],
        ];
    }
}
