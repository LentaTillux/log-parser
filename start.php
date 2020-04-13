<?php

namespace Start;

require "src/ParsingLogFile.php";
require "src/ParsingLogFile.php";

use Solov\Parser\ParsingLogFile;
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function testPushAndPop()
    {
        /*$result = new ParsingLogFile('data/access.log');
        $parse = $result->parse();
        print_r($parse);/** */

        $stack = [];
        $this->assertSame(0, count($stack));

        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack)-1]);
        $this->assertSame(1, count($stack));

        $this->assertSame('foo', array_pop($stack));
        $this->assertSame(0, count($stack));
    }
}
//print_r(__DIR__.'/src/ParsingLogFile.php');
/** */