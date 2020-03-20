<?php


namespace Big3;


class RunLengthWithNumReplace extends RunLength
{
    protected array $replaceTable = [
        '0' => ')',
        '1' => '!',
        '2' => '@',
        '3' => '#',
        '4' => '$',
        '5' => '%',
        '6' => '^',
        '7' => '&',
        '8' => '*',
        '9' => '(',
    ];

    public function encode(string $input): string
    {
        $input = str_replace(array_keys($this->replaceTable), $this->replaceTable, $input);

        return parent::encode($input);
    }

    public function decode(string $input): string
    {
        $output = parent::decode($input);

        return str_replace($this->replaceTable, array_keys($this->replaceTable), $output);
    }
}