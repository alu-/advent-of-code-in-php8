<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2016\Day5;

use Alu\AdventOfCode\Helpers\Solution;

class Part2 extends Solution
{
    public function run(): string
    {
        $input = $this->getInput(true);
        $password = [];
        $count = 0;
        for ($i = 0;; $i++) {
            $hash = md5($input . $i);
            if (str_starts_with($hash, '00000')) {
                if (ctype_digit(substr($hash, 5, 1))) {
                    $position = (int) substr($hash, 5, 1);
                    if ($position >= 0 && $position < 8 && !array_key_exists($position, $password)) {
                        $password[$position] = substr($hash, 6, 1);
                        $count++;

                        if ($count === 8) {
                            ksort($password);
                            return implode('', $password);
                        }
                    }
                }
            }
        }
    }
}
