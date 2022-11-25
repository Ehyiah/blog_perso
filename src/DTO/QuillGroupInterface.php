<?php

namespace App\DTO;

interface QuillGroupInterface
{
    public static function build(QuillFieldInterface ...$fields): array;
}
