<?php
namespace Big3;

interface Encoder
{
    public function encode(string $input): string;

    public function decode(string $input): string;
}