<?php

declare(strict_types=1);

namespace Solov\Parser;

use Solov\Parser\UtilsPHP;
use Solov\Parser\ParsingInterface;

class ParsingLogFile //implements ParsingInterface
{
    private $file;

    public function __construct(?string $file = null)
    {
        $this->file = $file;
    }

    public function parse(): array
    {
        $matches = [];
        $file = $this->file;
        $pattern = '#(^(\S+) (\S+) (\S+) \[([\w:/]+\s[+\-]\d{4})\] "(\S+)\s?(\S+)?\s?(\S+)?" (\d{3}|-) (\d+|-)\s?"?([^"]*)"?\s?"?([^"]*)?")#i';

        if (file_exists($file)) {
            $file = fopen($file, "r");
            while (!feof($file)) {
                $line = fgets($file, 4096);
                //var_dump($line);
                UtilsPHP::pregMatchAll($pattern, $line, $matches);
            }
            fclose($file);
        }
        //print_r($matches);
        return $matches;
    }
}
