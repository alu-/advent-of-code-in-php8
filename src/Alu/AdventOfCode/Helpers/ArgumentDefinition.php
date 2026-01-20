<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Helpers;

readonly class ArgumentDefinition
{
    public function __construct(
        public string $name,
        public string $description,
        public Type $type,
        public mixed $default
    ) {
    }
}
