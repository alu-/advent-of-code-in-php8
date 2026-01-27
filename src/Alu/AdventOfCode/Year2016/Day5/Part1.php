<?php
declare(strict_types = 1);

namespace Alu\AdventOfCode\Year2016\Day5;

use Alu\AdventOfCode\Helpers\Solution;

class Part1 extends Solution
{
    public function run(): string
    {
        $input = $this->getInput(true);
        $password = '';
        $count = 0;
        for ($i = 0;; $i++) {
            $hash = md5($input . $i);
            if (str_starts_with($hash, '00000')) {
                $password .= substr($hash, 5, 1);
                $count++;

                if ($count === 8) {
                    return $password;
                }
            }
        }
    }
}
