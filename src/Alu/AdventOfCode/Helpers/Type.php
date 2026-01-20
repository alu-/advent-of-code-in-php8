<?php
declare(strict_types=1);

namespace Alu\AdventOfCode\Helpers;

enum Type
{
    case BOOL;
    case INT;
    case FLOAT;
    case STRING;
    case ARRAY;
    case OBJECT;
    case RESOURCE;
    case NULL;
    case CALLABLE;

    public function validate(mixed $value): bool
    {
        return match ($this) {
            self::BOOL => is_bool($value),
            self::INT => is_int($value),
            self::FLOAT => is_float($value),
            self::STRING => is_string($value),
            self::ARRAY => is_array($value),
            self::OBJECT => is_object($value),
            self::RESOURCE => is_resource($value),
            self::NULL => is_null($value),
            self::CALLABLE => is_callable($value),
        };
    }
}
