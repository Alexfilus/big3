<?php

namespace Big3;

class GroupByPeriod
{
    /**
     * @var Row[]
     */
    protected array $data;
    protected int $period;

    /**
     * GroupByPeriod constructor.
     * @param Row[] $data
     * @param int $period
     */
    public function __construct(array $data, int $period)
    {
        $this->data = $data;
        $this->period = $period;
    }

    /**
     * @return Row[][]
     */
    public function toFormatA2(): array
    {
        // В условии задачи не сказано прямо что массив отсортирован по времени, поэтому на всякий случай сортируем
        $this->sort();

        $result = [];

        foreach ($this->data as $row) {
            $result[intdiv($row->time, $this->period)][] = $row;
        }

        return array_values($result);
    }

    protected function sort()
    {
        usort($this->data, fn(Row $a, Row $b) => $a->time <=> $b->time);
    }

    /**
     * @return int
     */
    public function getPeriod(): int
    {
        return $this->period;
    }

    /**
     * @param int $period
     */
    public function setPeriod(int $period): void
    {
        $this->period = $period;
    }

    /**
     * @return Row[]
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param Row[] $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }
}