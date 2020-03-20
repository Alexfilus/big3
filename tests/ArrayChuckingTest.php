<?php


use Big3\GroupByPeriod;
use Big3\Row;
use Big3\ToA3;
use PHPUnit\Framework\TestCase;

class ArrayChuckingTest extends TestCase
{
    function testTask()
    {
        $example = [
            new Row(5, 1577550000),
            new Row(6, 1587850000),
            new Row(7, 1588150000),
            new Row(8, 1588180000),
        ];
        $exampleResultA2 = [
            [
                new Row(5, 1577550000),
            ],
            [
                new Row(6, 1587850000),
            ],
            [
                new Row(7, 1588150000),
                new Row(8, 1588180000),
            ],
        ];
        $exampleResultA3 = [5, 6, 15];
        $period = 300000;
        $grouper = new GroupByPeriod($example, $period);
        $a2 = $grouper->toFormatA2();
        $this->assertEquals($a2, $exampleResultA2);
        $a3 = (new ToA3($a2))->getGrouped();
        $this->assertEquals($a3, $exampleResultA3);
    }
}