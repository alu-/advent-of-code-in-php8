<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2025\Day7;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): int
    {
        $lines = $this->getInputLines(true)
                |> (fn($a) => array_map(str_split(...), $a));

        $beamsByLine = array_fill(0, count($lines), []);
        $splitCount = 0;
        foreach ($lines as $lineKey => $line) {
            foreach ($line as $index => $cell) {
                switch (CellType::from($cell)) {
                    case CellType::Start:
                        $beamsByLine[$lineKey][] = $index;
                        break;
                    case CellType::Empty:
                        if (self::previousLineHadBeam($lineKey, $index, $beamsByLine)) {
                            $beamsByLine[$lineKey][] = $index;
                        }
                        break;
                    case CellType::Splitter:
                        if (self::previousLineHadBeam($lineKey, $index, $beamsByLine)) {
                            $beamsByLine[$lineKey][] = $index - 1;
                            $beamsByLine[$lineKey][] = $index + 1;
                            $splitCount++;
                        }
                        break;
                }
            }
        }

        return $splitCount;
    }

    protected static function previousLineHadBeam(int $currentLine, int $index, array $beams): bool
    {
        return array_key_exists($currentLine - 1, $beams) && in_array($index, $beams[$currentLine - 1]);
    }
}
