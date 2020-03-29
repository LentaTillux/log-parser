<?php

declare(strict_types=1);

class UtilsPHP
{
    public static function preg_match_all(string $pattern , string $subject, array &$matches = []): int
    {
        return preg_match_all($pattern, $subject, $matches);
    }
}