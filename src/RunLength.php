<?php
namespace Big3;

class RunLength implements Encoder
{
    public function __construct()
    {
    }

    public function encode(string $input): string
    {
        if (empty($input)) {
            return '';
        }
        $arLetter = str_split($input);
        $count = 1;
        $output = '';
        $prevLetter = null;
        foreach ($arLetter as $letter) {
            if ($letter === $prevLetter) {
                ++$count;
            } else {
                $output .= (($count > 1) ? $count : '') . $prevLetter;
                $count = 1;
            }
            $prevLetter = $letter;
        }
        $output .= (($count > 1) ? $count : '') . $prevLetter;

        return $output;
    }

    public function decode(string $input): string
    {
        if (empty($input)) {
            return '';
        }
        $arSymbols = str_split($input);
        $count = '';
        $output = '';
        foreach ($arSymbols as $symbol) {
            if (is_numeric($symbol)) {
                $count .= $symbol;
            } else {
                $output .= str_repeat($symbol, (int)$count ?: 1);
                $count = '';
            }
        }

        return $output;
    }
}