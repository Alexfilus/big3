<?php

use Big3\RunLength;
use PHPUnit\Framework\TestCase;

class RunLengthTest extends TestCase
{
    private RunLength $encoder;

    function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->encoder = new RunLength();
    }

    function testEmpty()
    {
        $this->assertEmpty($this->encoder->encode(''));
        $this->assertEmpty($this->encoder->decode(''));
    }

    function testCommon()
    {
        $source = 'AAABCCDDDDDEAFAF';
        $encoded = '3AB2C5DEAFAF';
        $this->assertEquals($this->encoder->encode($source), $encoded);
        $this->assertEquals($this->encoder->decode($encoded), $source);
    }
}