<?php

use Big3\Encoder;
use Big3\RunLengthWithNumReplace;
use PHPUnit\Framework\TestCase;

class RunLengthWithNumTest extends TestCase
{
    private Encoder $encoder;

    function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->encoder = new RunLengthWithNumReplace();
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

    function testWithNumbers()
    {
        $source = '3333AAAA1B';
        $encoded = '4#4A!B';
        $this->assertEquals($this->encoder->encode($source), $encoded);
        $this->assertEquals($this->encoder->decode($encoded), $source);
    }
}