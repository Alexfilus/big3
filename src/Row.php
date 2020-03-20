<?php


namespace Big3;

class Row
{
    public int $value;
    public int $time;

    public function __construct(int $value, int $time)
    {
        $this->value = $value;
        $this->time = $time;
    }
}