<?php

namespace Big3;

class ToA3
{
    /** @var Row[][] */
    protected array $data;

    /**
     * ToA3 constructor.
     * @param Row[][] $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getGrouped(): array
    {
        $reducer = fn($carry, Row $row) => $carry + $row->value;

        return array_map(fn(array $rows) => array_reduce($rows, $reducer), $this->data);
    }
}