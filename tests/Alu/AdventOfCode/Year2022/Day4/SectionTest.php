<?php

namespace Tests\Alu\AdventOfCode\Year2022\Day4;

use Alu\AdventOfCode\Year2022\Day4\Section;
use JetBrains\PhpStorm\Pure;
use PHPUnit\Framework\TestCase;

class SectionTest extends TestCase
{
    public function testConstruct()
    {
        $this->assertInstanceOf(Section::class, new Section(0, 20));
    }

    /**
     * @dataProvider sectionDataProvider
     * @param Section $left
     * @param Section $right
     * @param bool $expected
     * @return void
     */
    public function testContainsSection(Section $left, Section $right, bool $expected): void
    {
        $this->assertEquals($expected, $left->containsSection($right));
    }

    #[Pure]
    public function sectionDataProvider(): array
    {
        return [
            [
                new Section(0, 20),
                new Section(1, 19),
                true
            ],
            [
                new Section(5, 10),
                new Section(1, 19),
                false
            ],
            [
                new Section(0, 20),
                new Section(0, 20),
                true
            ],
            [
                new Section(0, 20),
                new Section(0, 19),
                true
            ],
            [
                new Section(PHP_INT_MIN, PHP_INT_MAX),
                new Section(5, 5),
                true
            ],
        ];
    }
}
