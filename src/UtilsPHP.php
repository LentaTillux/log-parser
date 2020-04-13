<?php

declare(strict_types=1);

namespace Solov\Parser;

class UtilsPHP
{
    public static function pregMatchAll(string $pattern , string $subject, array &$matches = []): int
    {
        return preg_match_all($pattern, $subject, $matches);
    }
}