<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2025\Day7;

use Alu\AdventOfCode\Helpers\Solution;

class Part2 extends Solution
{
    public function run(): int
    {
        $lines = $this->getInputLines(true)
                |> (fn($a) => array_map(str_split(...), $a));

        $beamsByLine = array_fill(0, count($lines), []);
        foreach ($lines as $lineKey => $line) {
            foreach ($line as $index => $cell) {
                if (self::previousLineHadBeam($lineKey, $index, $beamsByLine)) {
                    $previousBeamPower = $beamsByLine[$lineKey - 1][$index];
                } else {
                    $previousBeamPower = 0;
                }

                switch (CellType::from($cell)) {
                    case CellType::Start:
                        $beamsByLine[$lineKey][$index] = 1;
                        break;
                    case CellType::Empty:
                        if (self::previousLineHadBeam($lineKey, $index, $beamsByLine)) {
                            if (array_key_exists($index, $beamsByLine[$lineKey])) {
                                $beamsByLine[$lineKey][$index] += $previousBeamPower;
                            } else {
                                $beamsByLine[$lineKey][$index] = $previousBeamPower;
                            }
                        }
                        break;
                    case CellType::Splitter:
                        if (self::previousLineHadBeam($lineKey, $index, $beamsByLine)) {
                            if (array_key_exists($index - 1, $beamsByLine[$lineKey])) {
                                $beamsByLine[$lineKey][$index - 1] += $previousBeamPower;
                            } else {
                                $beamsByLine[$lineKey][$index - 1] = $previousBeamPower;
                            }

                            if (array_key_exists($index + 1, $beamsByLine[$lineKey])) {
                                $beamsByLine[$lineKey][$index + 1] += $previousBeamPower;
                            } else {
                                $beamsByLine[$lineKey][$index + 1] = $previousBeamPower;
                            }
                        }
                        break;
                }
            }
        }

        return array_sum(array_last($beamsByLine));
    }

    protected static function previousLineHadBeam(int $currentLine, int $index, array $beams): bool
    {
        return array_key_exists($currentLine - 1, $beams) && array_key_exists($index, $beams[$currentLine - 1]);
    }
}
